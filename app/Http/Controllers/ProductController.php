<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\DealOfDay;
use App\Models\ProductCart;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Helper\ResponseHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function bestSale()
    {
        $bestSale = Product::where("remark", "popular")->take(4)->get();

        return response()->json($bestSale);
    }
    public function NewArrivals()
    {
        $newArrivals = Product::where("remark", "new")->take(4)->with(relations: 'categories')->get();
        $newArrivals1 = Product::where("remark", "new")->skip(4)->with(relations: 'categories')->take(4)->get();

        $data = [
            "first_batch" => $newArrivals,
            "second_batch" => $newArrivals1];

        return response()->json($data);

    }
    public function TrendingProduct()
    {
        $trending = Product::where("remark", "trending")->take(4)->with(relations: 'categories')->get();
        $trending1 = Product::where("remark", "trending")->skip(4)->take(4)->with(relations: 'categories')->get();

        $data = [
            "first_trending" => $trending,
            "second_trending" => $trending1];

        return response()->json($data);

    }
    public function TopRateProduct()
    {
        $top = Product::where("remark", "top")->take(4)->with(relations: 'categories')->get();
        $top1 = Product::where("remark", "top")->skip(4)->take(4)->with(relations: 'categories')->get();

        $data = [
            "first_top" => $top,
            "second_top" => $top1];

        return response()->json($data);

    }

    public function DealOfDay()
    {
        $deals = DealOfDay::take(2)->with('products')->get();

        return response()->json($deals);
    }

    public function NewProducts()
    {
        $products = Product::orderBy('updated_at', "desc")->with('categories')->paginate(12);

        return response()->json($products);
    }

    // public function CategoryProducts() {
    //     return view('home.category-wise-product');
    // }
    public function searchCategoryProducts(Request $request)
    {
        $searchQuery = $request->query('query');
        // Check if the query parameter is empty
        if (empty($searchQuery)) {
            return response()->json(['message' => 'Search query is required'], 400);
        }

        // Validate the query
        $request->validate([
            'query' => 'required|string|min:1',
        ]);

        // Perform the search
        $products = Product::with('category')
            ->where('title', 'like', '%' . $searchQuery . '%')
            ->orWhere('price', 'like', '%' . $searchQuery . '%')
            ->orWhereHas('category', function ($query) use ($searchQuery) {
                $query->where('categoryName', 'like', '%' . $searchQuery . '%');
            })
            ->paginate(8);

        // If no products found, return a response
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found'], 404);
        }
        // Return products and pagination
        return response()->json([
            'data' => $products->items(),
            'pagination' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
            ],
        ]);
    }

    public function CategoryWise(Request $request, $categoryName)
    {

        $category = Category::where('categoryName', $categoryName)->first();

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $products = Product::where('category_id', $category->id)->paginate(8);

        // Fetch all main categories with their related categories (subcategories)
        $mainCategories = MainCategory::with('categories')->get();

        $bestSale = Product::where("remark", "popular")->take(4)->get();

        return view('home.category-wise-product', compact('products', 'category', 'mainCategories','bestSale'));
    }

    public function ProductDetails(Request $request, $id)
    {
        $product = Product::where('id', $id)->with('categories')->first();
        $product_details= ProductDetail::where('product_id', $id)->first();
        $p_color = $product_details->color;
        $colors = explode(',', $p_color); // Split the string into an array
        // dd($colors);
        return view('home.product-details', compact('product', 'product_details', 'colors'));
    }

    public function ProductRemark(Request $request, $remark)
    {
        // dd( $remark);
        $products = Product::where('remark', $remark)->paginate(8);
        $mainCategories = MainCategory::with('categories')->get();

        $bestSale = Product::where("remark", "popular")->take(4)->get();

        return view('home.products-remark', compact('products', 'remark','mainCategories','bestSale'));
    }

    public function CreateCartList(Request $request)
    {
        $user_id = $request->header('id');

        if (!$user_id) {
            return response()->json([
                'message' => "Please log in first.",
            ], 401);
        }

        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'color' => 'nullable|string',
            'qty' => 'required|integer|min:1',
        ]);

        $product_id = $validatedData['product_id'];
        $color = $validatedData['color'];
        $qty = $validatedData['qty'];

        $productDetails = Product::find($product_id);

        if (!$productDetails) {
            return response()->json([
                'message' => "Product not found."
            ], 404);
        }

        $unitPrice = $productDetails->discount ? $productDetails->discount_price : $productDetails->price;
        $totalPrice = $qty * $unitPrice;

        $data = ProductCart::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $product_id],
            [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'color' => $color,
                'qty' => $qty,
                'price' => $totalPrice,
            ]
        );

        return response()->json([
            "message" => "Product added to cart. Please check your cart.",
            'status' => "success",
        ], 201);
    }


    public function CartListPage(){
        return view('home.product-carts');
    }

    public function CartList(Request $request)
{
    try {
        // Validate user_id header
        $user_id = $request->header('id');
        if (!$user_id) {
            return response()->json([
                'status' => 'error',
                'message' => 'User ID is required.',
            ], 400);
        }

        // Fetch cart items with product details
        $data = ProductCart::where('user_id', $user_id)
            ->with(['product:id,title,image,price']) // Optimize query with selected fields
            ->get();

        // Check if the cart is empty
        if ($data->isEmpty()) {
            return response()->json([
                'data' => [],
                'status' => 'success',
                'message' => 'Your cart is empty. Start shopping now!',
            ], 200);
        }

        // Return cart items
        return response()->json([
            'data' => $data,
            'status' => 'success',
        ], 200);
    } catch (\Exception $e) {
        // Log the error and return a generic message
        // \Log::error('CartList Error: ' . $e->getMessage());

        return response()->json([
            'status' => 'error',
            'message' => 'Failed to fetch cart items. Please try again later.',
        ], 500);
    }
}




    public function DeleteCartList(Request $request){
        $user_id=$request->header('id');
        $data=ProductCart::where('user_id','=',$user_id)->where('product_id','=',$request->product_id)->delete();
        return ResponseHelper::Out('success',$data,200);
    }

    //Product create
    public function CreateProduct(Request $request)
    {
            // Validate request data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'short_des' => 'required|string|max:255',
                'price' => 'required|numeric',
                'discount_price' => 'required|numeric',
                'stock' => 'required|numeric',
                'star' => 'required|numeric',
                'remarks' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'main_category_id' => 'required|numeric',
                'category_id' => 'required|numeric',
                'brand_id' => 'required|numeric',
                'color' => 'required|string|max:255',
                'size' => 'required|string|max:255',
                'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
                'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
                'img3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
                'img4' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
            ]);

            $imageUrls = [];

            // Handle multiple images
            foreach (['img1', 'img2', 'img3', 'img4'] as $imgField) {
                if ($request->hasFile($imgField)) {
                    $img = $request->file($imgField);
                    $imgName = time() . '-' . $img->getClientOriginalName();
                    $img->move(public_path('products'), $imgName);
                    $imageUrls[$imgField] = "products/{$imgName}";
                }
            }

            // Save the product to the database
            try {
                DB::beginTransaction();
            
                // Save the product to the database
                $product = Product::create([
                    'title' => $validatedData['title'],
                    'short_des' => $validatedData['short_des'],
                    'price' => $validatedData['price'],
                    'discount' => 0,
                    'discount_price' => $validatedData['discount_price'],
                    'stock' => $validatedData['stock'],
                    'remarks' => $validatedData['remarks'],
                    'star' => $validatedData['star'],
                    'main_category_id' => $validatedData['main_category_id'],
                    'category_id' => $validatedData['category_id'],
                    'brand_id' => $validatedData['brand_id'],
                    'image' => $imageUrls['img1'] ?? null,
                ]);
                // Save product details, ensuring the `product_id` is set
                $productDetails = ProductDetail::create([
                    'product_id' => $product->id,
                    'img1' => $imageUrls['img1'] ?? null,
                    'img2' => $imageUrls['img2'] ?? null,
                    'img3' => $imageUrls['img3'] ?? null,
                    'img4' => $imageUrls['img4'] ?? null,
                    'color' => $validatedData['color'],
                    'size' => $validatedData['size'],
                    'des' => $validatedData['description'],
                ]);
                
            
                DB::commit();
            
                return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
            
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Product creation failed', 'error' => $e->getMessage()], 500);
            }
    }
    function ProductList(Request $request)
    {
        // $user_role=$request->header('role');
        $product = Product::with('category', 'main_category','brand')->get();
        return response()->json([
            'data' => $product,
            // 'role' => $user_role,
        ]);
    }

    function editProduct(Request $request){
        // Fetch product by ID from the query parameter
        $productId = $request->query('id');

        // dd($productId);
        $product = Product::where('id', $productId)->with('main_category','category', 'brand')->first();
        $product_detail = ProductDetail::where('id', $productId)->first();
        // Check if the product exists
        if (!$product) {
            return redirect()->route('product.list')->with('error', 'Product not found');
        }

        // Return edit view with product details
        return view('admin-page.product-edit', compact('product', 'product_detail'));

    }

    function UpdateProduct(Request $request) {
        $id = $request->input('id');
        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_des' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'star' => 'required|numeric',
            'remarks' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'main_category_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
            'img3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
            'img4' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
        ]);
    
        $imageUrls = [];
    
        // Handle multiple images
        foreach (['img1', 'img2', 'img3', 'img4'] as $imgField) {
            if ($request->hasFile($imgField)) {
                $img = $request->file($imgField);
                $imgName = time() . '-' . $img->getClientOriginalName();
                $img->move(public_path('products'), $imgName);
                $imageUrls[$imgField] = "products/{$imgName}";
            }
        }
    
        // Fetch existing product
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Save the product to the database
        try {
            DB::beginTransaction();
    
            // Update the product
            $product->update([
                'title' => $validatedData['title'],
                'short_des' => $validatedData['short_des'],
                'price' => $validatedData['price'],
                'discount' => 0,
                'discount_price' => $validatedData['discount_price'],
                'stock' => $validatedData['stock'],
                'remarks' => $validatedData['remarks'],
                'star' => $validatedData['star'],
                'main_category_id' => $validatedData['main_category_id'],
                'category_id' => $validatedData['category_id'],
                'brand_id' => $validatedData['brand_id'],
                'image' => $imageUrls['img1'] ?? $product->image,
            ]);
    
            // Update product details
            $productDetails = ProductDetail::where('product_id', $id)->update([
                'img1' => $imageUrls['img1'] ?? null,
                'img2' => $imageUrls['img2'] ?? null,
                'img3' => $imageUrls['img3'] ?? null,
                'img4' => $imageUrls['img4'] ?? null,
                'color' => $validatedData['color'],
                'size' => $validatedData['size'],
                'des' => $validatedData['description'],
            ]);
    
            DB::commit();
    
            return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
    
        } catch (\Exception $e) {
            DB::rollBack();
            // Log error for debugging in production
            Log::error('Product update failed: ' . $e->getMessage());
            return response()->json(['message' => 'Product update failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function ProductDelete(Request $request)
    {
        $product_id = $request->query('id');
        $product_details = ProductDetail::where('product_id', $product_id)->first();
        // dd($product_details);
        $product_id=$product_details->product_id;
        
        if (!$product_details) {
            return redirect()->back()->with('error', 'Product not found');
        }

        try {
            DB::beginTransaction();

            // Deleting images if they exist
            $img_paths = [
                $product_details->img1 ?? '',
                $product_details->img2 ?? '',
                $product_details->img3 ?? '',
                $product_details->img4 ?? '',
            ];

            foreach ($img_paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            // Deleting product records
            $product_details->delete(); // Deletes from `ProductDetail`
            Product::where('id', $product_id)->delete(); // Deletes from `Product`

            DB::commit();

            return redirect()->back()->with('message', 'Product Deleted');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error for debugging
            Log::error('Product delete failed: ' . $e->getMessage());

            // Return error response
            return redirect()->back()->with('error', 'Failed to delete product. Please try again later.');
        }
    }



 }