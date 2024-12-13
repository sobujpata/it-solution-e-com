<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

//Category Api
Route::get('/Category-header-list', [CategoryController::class, "CategoryHeader"]);

Route::get('/Category-list', [CategoryController::class, "CategoryList"]);

Route::get('/product-banner', [BannerController::class, 'GetBanner']);

Route::get('/best-sale', [ProductController::class, 'bestSale']);

Route::get('/new-arrivals', [ProductController::class, 'NewArrivals']);

Route::get('/trending', [ProductController::class, 'TrendingProduct']);

Route::get('/top-rate', [ProductController::class, 'TopRateProduct']);

Route::get('/deal-of-day', [ProductController::class, 'DealOfDay']);

Route::get('/new-products', [ProductController::class, "NewProducts"]);

// Search products within a category
// Route::get('/product/category/search', [ProductController::class, 'searchCategoryProducts']);
Route::get('/product-category/{categoryName}', [ProductController::class, 'CategoryWise']);

// Route::get('/category-products', [ProductController::class, 'CategoryProducts']);

//product details
Route::get('/products/{id}', [ProductController::class, 'ProductDetails']);

Route::get('/products-remark/{remark}', [ProductController::class, 'ProductRemark'])->name('product.remark');



Route::get('/testimonial', [TestimonialController::class, 'Testimonial']);

Route::get('/services', [ServiceController::class, 'index']);
//demo
Route::get('/blogs-card', [BlogController::class, 'BlogCard']);
//demo
Route::get('/brand-category', [BrandController::class, 'BrandWithCategory']);
