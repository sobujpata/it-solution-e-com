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
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductCardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Http\Controllers\Admin\AdminDashboardController;

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

//Customer dashboard route
Route::middleware(['user'])->group(function (){
//cart page
Route::get('/cart', [ProductController::class, 'CartListPage']);
// Product Cart
Route::post('/CreateCartList', [ProductController::class, 'CreateCartList']); 
Route::get('/CartList', [ProductController::class, 'CartList']);
Route::get('/DeleteCartList/{product_id}', [ProductController::class, 'DeleteCartList']);
});
//admin dashboard
Route::middleware(['admin'])->group(function () {
//Admin API
Route::get('/admin-list', [AdminDashboardController::class, 'adminList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/admin-by-id', [AdminDashboardController::class, 'adminEdit'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-list', [AdminDashboardController::class, 'userList'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard', [AdminDashboardController::class, 'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);

//Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);


Route::get('/products-list', [DashboardController::class, 'DashboardProductsPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard/product-add', [DashboardController::class, 'DashboardProductsAddPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard/setting', [DashboardController::class, 'SettingPage'])->middleware([TokenVerificationMiddleware::class]);

//customer Route
Route::get('customers', [DashboardController::class, 'DashboardCustomersPage'])->middleware([TokenVerificationMiddleware::class]);

// Customer API
Route::get("/list-customer",[CustomerController::class,'CustomerList'])->name('product.list')->middleware([TokenVerificationMiddleware::class]);
Route::post("/create-customer",[CustomerController::class,'CustomerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-customer",[CustomerController::class,'CustomerDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-customer",[CustomerController::class,'CustomerUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/customer-by-id",[CustomerController::class,'CustomerByID'])->middleware([TokenVerificationMiddleware::class]);


//Invoice Route
Route::get('/orders', [DashboardController::class, 'DashboardOrdersPage'])->middleware([TokenVerificationMiddleware::class]);
// Invoice API
Route::post('/update-delivery-status', [InvoiceController::class, 'updateDeliveryStatus'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-invoice",[InvoiceController::class,'InvoiceList'])->name('product.list')->middleware([TokenVerificationMiddleware::class]);
Route::post("/create-invoice",[InvoiceController::class,'InvoiceCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-invoice",[InvoiceController::class,'InvoiceDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-invoice",[InvoiceController::class,'InvoiceUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/invoice-by-id",[InvoiceController::class,'InvoiceByID'])->middleware([TokenVerificationMiddleware::class]);


// Product API
Route::post("/create-product",[ProductController::class,'CreateProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-product",[ProductController::class,'DeleteProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post( '/update-product', [ProductController::class, 'UpdateProduct'])->name('update-product')->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-product",[ProductController::class,'ProductList'])->middleware([TokenVerificationMiddleware::class]);
// Route::post("/product-by-id",[ProductController::class,'ProductByID']);
Route::get('/dashboard/product-edit', [ProductController::class, 'editProduct'])->name('product.edit')->middleware([TokenVerificationMiddleware::class]);

Route::get("/count-product",[DashboardController::class,'ProductCount'])->middleware([TokenVerificationMiddleware::class]);

// Category API
Route::get("/list-main-category",[CategoryController::class,'MainCategoryList'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-sub-category",[CategoryController::class,'SubCategoryList'])->middleware([TokenVerificationMiddleware::class]);


//Brand API
Route::get("/list-brand",[BrandController::class,'BrandList'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/brand-list",[BrandController::class,'BrandPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/brand-add",[BrandController::class,'BrandAddPage'])->middleware([TokenVerificationMiddleware::class]);
Route::POST("/create-brand",[BrandController::class,'BrandCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/brand-edit",[BrandController::class,'BrandEdit'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-brand",[BrandController::class,'BrandUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/brand-delete",[BrandController::class,'BrandDelete'])->middleware([TokenVerificationMiddleware::class]);

//main Category
Route::get("/main-category",[CategoryController::class,'MainCategoryPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/main-category-add",[CategoryController::class,'MainCategoryAddPage'])->middleware([TokenVerificationMiddleware::class]);
Route::POST("/create-main-category",[CategoryController::class,'MainCategoryCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/main-category-edit",[CategoryController::class,'MainCategoryEdit'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-main-category",[CategoryController::class,'MainCategoryUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/main-category-delete",[CategoryController::class,'MainCategoryDelete'])->middleware([TokenVerificationMiddleware::class]);

//Sub Category
Route::get("/sub-category",[CategoryController::class,'SubCategoryPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/sub-category-add",[CategoryController::class,'SubCategoryAddPage'])->middleware([TokenVerificationMiddleware::class]);
Route::POST("/create-sub-category",[CategoryController::class,'SubCategoryCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/sub-category-edit",[CategoryController::class,'SubCategoryEdit'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-sub-category",[CategoryController::class,'SubCategoryUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/sub-category-delete",[CategoryController::class,'SubCategoryDelete'])->middleware([TokenVerificationMiddleware::class]);

Route::get("/summary",[DashboardController::class,'Summary'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/visitors",[DashboardController::class,'VisitorCount'])->middleware([TokenVerificationMiddleware::class]);
});