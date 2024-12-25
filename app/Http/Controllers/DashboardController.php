<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function DashboardPage(){
        return view('admin-page.dashboard');
    }
    public function DashboardOrdersPage(){
        return view('admin-page.orders');
    }
    public function DashboardCustomersPage(){
        return view('admin-page.customers');
    }
    public function DashboardProductsPage(){
        return view('admin-page.products');
    }
    public function DashboardProductsAddPage(){
        return view('admin-page.product-add');
    }
    public function SettingPage(){
        return view('admin-page.setting');
    }


    public function ProductCount(){
        $countProduct = Product::count();

        return response()->json([
            'productCount'=>$countProduct
        ]);
    }
}
