<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

route::get('/',[HomeController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');

route::get('/category',[AdminController::class,'category']);

route::post('/add_category',[AdminController::class,'add_category']);

route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

route::get('/view_product',[AdminController::class,'view_product']);

route::post('/add_product',[AdminController::class,'add_product']);

route::get('/show_product',[AdminController::class,'show_product']);

route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

route::get('/update_product/{id}',[AdminController::class,'update_product']);

route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);



route::get('/product_details/{id}',[HomeController::class,'product_details']);

route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

route::get('/show_cart',[HomeController::class,'show_cart']);

route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/cash_order',[HomeController::class,'cash_order']);

Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

Route::post('stripe/{totalprice}', [HomeController::class,'stripePost'])->name('stripe.post');

route::get('/order',[AdminController::class,'order']);

route::get('/delivered/{id}',[AdminController::class,'delivered']);

route::get('/print/{id}',[AdminController::class,'print']);

route::get('/email/{id}',[AdminController::class,'email']);

route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);

route::get('/search',[AdminController::class,'searchdata']);

route::get('/show_order',[HomeController::class,'show_order']);

route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);

route::post('/add_comment',[HomeController::class,'add_comment']);

route::post('/add_reply',[HomeController::class,'add_reply']);

Route::post('like_comment', [HomeController::class, 'likeComment']);
Route::post('delete_comment', [HomeController::class, 'deleteComment']);

Route::get('search_product', [HomeController::class, 'search_product']);

Route::get('delete_order/{id}', [HomeController::class, 'delete_order'])->name('delete_order');

Route::get('admin/delivered/{id}', [AdminController::class, 'delivered'])->name('admin.delivered');

Route::delete('/deleteOrder/{id}', 'App\Http\Controllers\AdminController@deleteOrder')->name('admin.deleteOrder');

Route::get('sort', [AdminController::class, 'sortOrders'])->name('admin.sortOrders');

Route::get('sortByName', [AdminController::class, 'sortByName'])->name('admin.sortByName');

Route::get('filter-by-delivery-status', [AdminController::class, 'filterByDeliveryStatus'])->name('admin.filterByDeliveryStatus');

