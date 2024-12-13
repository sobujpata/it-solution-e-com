<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DealOfDay;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

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

        return view('home.category-wise-product', compact('products', 'category'));
    }

    public function ProductDetails(Request $request, $id)
    {
        $product = Product::where('id', $id)->with('categories')->first();
        $product_details= ProductDetail::where('product_id', $id)->first();
        // dd($product);
        return view('home.product-details', compact('product', 'product_details'));
    }

    public function ProductRemark(Request $request, $remark)
    {
        // dd( $remark);
        $products = Product::where('remark', $remark)->paginate(8);

        return view('home.products-remark', compact('products', 'remark'));
    }

}
