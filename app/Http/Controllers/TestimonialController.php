<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function Testimonial(){
        $testimonial =Testimonial::all();

        return response()->json($testimonial);
    }
}
