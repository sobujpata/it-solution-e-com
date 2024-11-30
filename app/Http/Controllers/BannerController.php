<?php

namespace App\Http\Controllers;

use App\Models\ProductSlider;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function GetBanner(){
        $banner = ProductSlider::all();

        return response()->json($banner);
    }
}
