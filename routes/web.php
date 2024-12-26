<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Middleware\TokenVerificationMiddleware;

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


//Auth Route
Route::get('/login', [UserController::class, 'LoginPage']);
Route::get('/registration', [UserController::class, 'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
// Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);


// Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);


// User Logout
Route::get('/logout',[UserController::class,'UserLogout']);


//cart page
Route::get('/cart', [ProductController::class, 'CartListPage']);
// Product Cart
Route::post('/CreateCartList', [ProductController::class, 'CreateCartList']); 
Route::get('/CartList', [ProductController::class, 'CartList']);
Route::get('/DeleteCartList/{product_id}', [ProductController::class, 'DeleteCartList']);


//Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'DashboardPage']);


Route::get('/products-list', [DashboardController::class, 'DashboardProductsPage']);
Route::get('/dashboard/product-add', [DashboardController::class, 'DashboardProductsAddPage']);
Route::get('/dashboard/setting', [DashboardController::class, 'SettingPage']);

//customer Route
Route::get('customers', [DashboardController::class, 'DashboardCustomersPage']);

// Customer API
Route::get("/list-customer",[CustomerController::class,'CustomerList'])->name('product.list');
Route::post("/create-customer",[CustomerController::class,'CustomerCreate']);
Route::post("/delete-customer",[CustomerController::class,'CustomerDelete']);
Route::post("/update-customer",[CustomerController::class,'CustomerUpdate']);
Route::post("/customer-by-id",[CustomerController::class,'CustomerByID']);


//Invoice Route
Route::get('/orders', [DashboardController::class, 'DashboardOrdersPage']);
// Invoice API
Route::post('/update-delivery-status', [InvoiceController::class, 'updateDeliveryStatus']);
Route::get("/list-invoice",[InvoiceController::class,'InvoiceList'])->name('product.list');
Route::post("/create-invoice",[InvoiceController::class,'InvoiceCreate']);
Route::post("/delete-invoice",[InvoiceController::class,'InvoiceDelete']);
Route::post("/update-invoice",[InvoiceController::class,'InvoiceUpdate']);
Route::post("/invoice-by-id",[InvoiceController::class,'InvoiceByID']);


// Product API
Route::post("/create-product",[ProductController::class,'CreateProduct']);
Route::post("/delete-product",[ProductController::class,'DeleteProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post( '/update-product', [ProductController::class, 'UpdateProduct'])->name('update-product');
Route::get("/list-product",[ProductController::class,'ProductList']);
// Route::post("/product-by-id",[ProductController::class,'ProductByID']);
Route::get('/dashboard/product-edit', [ProductController::class, 'editProduct'])->name('product.edit');

Route::get("/count-product",[DashboardController::class,'ProductCount']);

// Category API
Route::get("/list-main-category",[CategoryController::class,'MainCategoryList']);
Route::get("/list-sub-category",[CategoryController::class,'SubCategoryList']);


//Brand API
Route::get("/list-brand",[BrandController::class,'BrandList']);
Route::get("/brand-list",[BrandController::class,'BrandPage']);
Route::get("/brand-add",[BrandController::class,'BrandAddPage']);
Route::POST("/create-brand",[BrandController::class,'BrandCreate']);
Route::get("/brand-edit",[BrandController::class,'BrandEdit']);
Route::post("/update-brand",[BrandController::class,'BrandUpdate']);
Route::get("/brand-delete",[BrandController::class,'BrandDelete']);

//main Category
Route::get("/main-category",[CategoryController::class,'MainCategoryPage']);
Route::get("/main-category-add",[CategoryController::class,'MainCategoryAddPage']);
Route::POST("/create-main-category",[CategoryController::class,'MainCategoryCreate']);
Route::get("/main-category-edit",[CategoryController::class,'MainCategoryEdit']);
Route::post("/update-main-category",[CategoryController::class,'MainCategoryUpdate']);
Route::get("/main-category-delete",[CategoryController::class,'MainCategoryDelete']);

//Sub Category
Route::get("/sub-category",[CategoryController::class,'SubCategoryPage']);
Route::get("/sub-category-add",[CategoryController::class,'SubCategoryAddPage']);
Route::POST("/create-sub-category",[CategoryController::class,'SubCategoryCreate']);
Route::get("/sub-category-edit",[CategoryController::class,'SubCategoryEdit']);
Route::post("/update-sub-category",[CategoryController::class,'SubCategoryUpdate']);
Route::get("/sub-category-delete",[CategoryController::class,'SubCategoryDelete']);

