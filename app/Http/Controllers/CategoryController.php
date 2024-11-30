<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function CategoryHeader(){
        $category = Category::all();

        return response()->json($category);
    }

    // public function CategoryList() {
    //     $sidebarCategory = Category::get();  // This returns a collection of all categories

        //foreach ($sidebarCategory as $category) {
            // Access main_category_id for each category
            //$category_id = $category->main_category_id;

            //dd($category_id);  // This will dump and stop on the first iteration
    //     }
    
    //     return response()->json($sidebarCategory);
    // }

    public function CategoryList()
        {
            // Fetch all main categories with their related categories (subcategories)
            $mainCategories = MainCategory::with('categories')->get();


            return response()->json($mainCategories);
            
        }
    
}
