<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function MainCategoryPage()
    {
        return view('admin-page.main-category');
    }
    public function MainCategoryAddPage(){
        return view('admin-page.main-category-add');
    }
    public function MainCategoryCreate(Request $request){
        // $user_id=$request->header('id');

        $categoryName = $request->input('categoryName');
        // Prepare File Name & Path
        $img = $request->file('img1');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$t}-{$file_name}";
        $img_url = "category/{$img_name}";

        // Upload File to the 'category' folder in public
        $img->move(public_path('category'), $img_name);
        $categoryCreate=MainCategory::create([
            'categoryName'=>$categoryName,
            'categoryImg'=>$img_url
        ]);
        return response()->json($categoryCreate);
    }

    public function MainCategoryEdit(Request $request){
        $id = $request->query('id');
        $mainCategory = MainCategory::where('id', $id)->first();

        return view('admin-page.main-category-edit', compact('mainCategory'));
    }

    public function MainCategoryUpdate(Request $request){
        $id = $request->input('id');
        $categoryName=$request->input('categoryName');
        $img = $request->file('img1');

        if($img){
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$t}-{$file_name}";
            $img_url = "category/{$img_name}";

            // Upload File to the 'category' folder in public
            $img->move(public_path('category'), $img_name);
            $categoryCreate=MainCategory::where('id', $id)->update([
                'categoryName'=>$categoryName,
                'categoryImg'=>$img_url
            ]);
            return response()->json($categoryCreate);

        }else{
            $categoryCreate=MainCategory::where('id', $id)->update([
                'categoryName'=>$categoryName,
            ]);
            return response()->json($categoryCreate);
        }
        

    }

    public function MainCategoryDelete(Request $request){
        $id = $request->query('id');
        $imagePath= $request->query('imgPath');

        File::delete($imagePath);
        MainCategory::where('id',$id)->delete();

        return redirect()->back()->with('message', 'Category Deleted');
    }
    public function SubCategoryPage()
    {
        return view('admin-page.sub-category');
    }


    public function SubCategoryAddPage(){
        return view('admin-page.sub-category-add');
    }

    public function SubCategoryCreate(Request $request){
        // $user_id=$request->header('id');

        $categoryName = $request->input('categoryName');
        $main_category_id = $request->input('main_category_id');
        // Prepare File Name & Path
        $img = $request->file('img1');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$t}-{$file_name}";
        $img_url = "category/{$img_name}";

        // Upload File to the 'category' folder in public
        $img->move(public_path('category'), $img_name);
        $categoryCreate=Category::create([
            'categoryName'=>$categoryName,
            'main_category_id'=>$main_category_id,
            'categoryImg'=>$img_url
        ]);
        return response()->json($categoryCreate);
    }

    public function SubCategoryEdit(Request $request){
        $id = $request->query('id');
        $subCategory = Category::where('id', $id)->first();

        return view('admin-page.sub-category-edit', compact('subCategory'));
    }

    public function SubCategoryUpdate(Request $request){
        $id = $request->input('id');
        $categoryName=$request->input('categoryName');
        $main_category_id =$request->input('main_category_id');
        $img = $request->file('img1');

        if($img){
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$t}-{$file_name}";
            $img_url = "category/{$img_name}";

            // Upload File to the 'category' folder in public
            $img->move(public_path('category'), $img_name);
            $categoryCreate=Category::where('id', $id)->update([
                'categoryName'=>$categoryName,
                'main_category_id'=>$main_category_id,
                'categoryImg'=>$img_url
            ]);
            return response()->json($categoryCreate);

        }else{
            $categoryCreate=Category::where('id', $id)->update([
                'categoryName'=>$categoryName,
                'main_category_id'=>$main_category_id,
            ]);
            return response()->json($categoryCreate);
        }
        

    }

    public function SubCategoryDelete(Request $request){
        $id = $request->query('id');
        $imagePath= $request->query('imgPath');

        File::delete($imagePath);
        Category::where('id',$id)->delete();

        return redirect()->back()->with('message', 'Category Deleted');
    }

    public function CategoryHeader(){
        $category = Category::all();

        return response()->json($category);
    }

    

    public function CategoryList()
        {
            // Fetch all main categories with their related categories (subcategories)
            $mainCategories = MainCategory::with('categories')->get();


            return response()->json($mainCategories);
            
        }

    
    public function MainCategoryList(){
        $mainCategories = MainCategory::get();

        return response()->json($mainCategories);
    }
    


    public function SubCategoryList(){
        $Categories = Category::get();

        return response()->json($Categories);
    }
    
}
