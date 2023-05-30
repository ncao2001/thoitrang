<?php

use App\Http\Middleware\CheckMemberLogin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class,'index']);
Route::get('/contact', [App\Http\Controllers\Frontend\HomeController::class,'contact']);

Route::prefix('shop')->group(function (){
    Route::get('product/{id}', [App\Http\Controllers\Frontend\ShopController::class,'show']);
    Route::post('product/{id}', [App\Http\Controllers\Frontend\ShopController::class,'postComment']);
    Route::get('', [App\Http\Controllers\Frontend\ShopController::class,'index']);
    Route::get('category/{categoryName}', [App\Http\Controllers\Frontend\ShopController::class,'category']);
});
Route::prefix('blog')->group(function (){
    Route::get('', [\App\Http\Controllers\frontend\BlogController::class,'index']);
    Route::get('/{id}', [App\Http\Controllers\Frontend\BlogController::class,'show']);
    Route::post('/{id}', [App\Http\Controllers\Frontend\BlogController::class,'postComment']);
});
Route::prefix('cart')->group(function () {
    Route::get('add', [\App\Http\Controllers\Frontend\CartController::class, 'add']);
    Route::get('/', [\App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('delete', [\App\Http\Controllers\Frontend\CartController::class, 'delete']);
    Route::get('destroy', [\App\Http\Controllers\Frontend\CartController::class, 'destroy']);
    Route::get('update', [\App\Http\Controllers\Frontend\CartController::class, 'update']);
});
Route::prefix('checkout')->group(function () {
    Route::get('', [App\Http\Controllers\Frontend\CheckoutController::class,'index']);
    Route::post('/', [App\Http\Controllers\Frontend\CheckoutController::class,'addOrder']);
    Route::get('/result', [App\Http\Controllers\Frontend\CheckoutController::class,'result']);

    Route::get('/vnPayCheck', [App\Http\Controllers\Frontend\CheckoutController::class,'vnPayCheck']);
});
Route::prefix('account')->group(function () {
    Route::get('login', [App\Http\Controllers\Frontend\AccountController::class,'login']);
    Route::post('login', [App\Http\Controllers\Frontend\AccountController::class,'checkLogin']);

    Route::get('logout', [App\Http\Controllers\Frontend\AccountController::class,'logout']);

    Route::get('register', [App\Http\Controllers\Frontend\AccountController::class,'register']);
    Route::post('register', [App\Http\Controllers\Frontend\AccountController::class,'postRegister']);
    Route::get('register', [App\Http\Controllers\Frontend\AccountController::class,'register']);
    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function () {
        Route::get('/', [App\Http\Controllers\Frontend\AccountController::class,'myOrderIndex']);
        Route::get('/{id}', [App\Http\Controllers\Frontend\AccountController::class,'myOrderShow']);
    });
});

//Dashboard(Admin)
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function () {
//    Route::redirect('','admin/user');
    Route::resource('index', \App\Http\Controllers\Admin\HomeController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('category', \App\Http\Controllers\Admin\ProductCategoryController::class);
    Route::resource('brand', \App\Http\Controllers\Admin\BrandController::class);
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('product/{product_id}/image', \App\Http\Controllers\Admin\ProductImageController::class);
    Route::resource('product/{product_id}/detail', \App\Http\Controllers\Admin\ProductDetailController::class);
    Route::resource('order', \App\Http\Controllers\Admin\OrderController::class);

    Route::prefix('login')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\HomeController::class,'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('', [\App\Http\Controllers\Admin\HomeController::class,'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });
    Route::get('logout', [\App\Http\Controllers\Admin\HomeController::class,'logout']);

});












