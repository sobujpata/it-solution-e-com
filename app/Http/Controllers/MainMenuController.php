<?php

namespace App\Http\Controllers;

use App\Models\MainMenu;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{
    public function MainMenuPage(){
        return view("admin-page.main-menu");
    }
    public function SubMenuPage(){
        return view("admin-page.sub-menu");
    }

    public function StoreMenu(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:main_menus,name',
            ]);

            $data = MainMenu::create([
                'name' => $request->input('name'),
            ]);

            return response()->json([
                'data' => $data,
                'status' => "success",
                'message' => "Created Successfully",
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => "error",
                'message' => "Something went wrong: " . $e->getMessage(),
            ], 500);
        }
    }
    public function SubMenuCreate(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:main_menus,name',
                'main_menu_id' => 'required|string|max:255',
            ]);

            $data = SubMenu::create([
                'name' => $request->input('name'),
                'main_menu_id' => $request->input('main_menu_id'),
            ]);

            return response()->json([
                'data' => $data,
                'status' => "success",
                'message' => "Created Successfully",
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => "error",
                'message' => "Something went wrong: " . $e->getMessage(),
            ], 500);
        }
    }

    public function ListMenu(){
        $data = MainMenu::get();

        return response()->json($data);
    }
    public function ListSubMenu(){
        $data = SubMenu::with("main_menu")->get();

        return response()->json($data);
    }
    
}
