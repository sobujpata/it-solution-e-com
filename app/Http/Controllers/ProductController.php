<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DealOfDay;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function bestSale(){
        $bestSale = Product::where("remark", "popular")->take(4)->get();

        return response()->json($bestSale);
    }
    public function NewArrivals(){
        $newArrivals = Product::where("remark", "new")->take(4)->get();
        $newArrivals1 = Product::where("remark", "new")->skip(4)->take(4)->get();

        $data=[
            "first_batch"=>$newArrivals,
            "second_batch"=>$newArrivals1];

        return response()->json($data);

    }
    public function TrendingProduct(){
        $trending = Product::where("remark", "trending")->take(4)->get();
        $trending1 = Product::where("remark", "trending")->skip(4)->take(4)->get();

        $data=[
            "first_trending"=>$trending,
            "second_trending"=>$trending1];

        return response()->json($data);

    }
    public function TopRateProduct(){
        $top = Product::where("remark", "top")->take(4)->get();
        $top1 = Product::where("remark", "top")->skip(4)->take(4)->get();

        $data=[
            "first_top"=>$top,
            "second_top"=>$top1];

        return response()->json($data);

    }

    public function DealOfDay(){
        $deals = DealOfDay::take(2)->with('products')->get();

        return response()->json($deals);
    }

    public function NewProducts(){
        $products = Product::orderBy('updated_at', "desc")->with('categories')->paginate(12);

        return response()->json($products);
    }

    public function CategoryProducts() {
        return view('home.category-wise-product');
    }
    public function CategoryWise($categoryName)
{
    $category = Category::where('categoryName', $categoryName)->first();

    if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
    }

    $products = Product::where('category_id', $category->id)->paginate(8);

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


    public function searchCategoryProducts(Request $request)
{
    $request->validate([
        'query' => 'required|string|min:1',
    ]);

    $searchQuery = $request->query('query');
    // dd($searchQuery);
    // First, try to search by product title or price, then fallback to category name
    $products = Product::with('category') // Include category data
        ->where('title', 'like', '%' . $searchQuery . '%')  // Search by product title
        ->orWhere('price', 'like', '%' . $searchQuery . '%')  // Search by product price
        ->orWhereHas('category', function ($query) use ($searchQuery) {
            // Search by category name only if needed
            $query->where('categoryName', 'like', '%' . $searchQuery . '%');
        })
        ->paginate(8); // Use pagination to limit results

    // If no products are found, return a proper message
    if ($products->isEmpty()) {
        return response()->json(['message' => 'No products found'], 404);
    }

    // Return the found products
    return response()->json($products);
}




    public function ProductDetails(){
        return view('home.product-details');
    }






}
