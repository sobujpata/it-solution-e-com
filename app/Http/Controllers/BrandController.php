<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function BrandShow(){
        $brand = Brand::all();

        return response()->json($brand);
    }

    function BrandWithCategory() {
        $ids = Brand::pluck('id');
        $brandWithCat = Product::select('brand_id', 'title', 'category_id')->with('categories')
            ->whereIn('brand_id', $ids)
            ->distinct('brand_id')
            ->get();
        return $brandWithCat;
    }
}
