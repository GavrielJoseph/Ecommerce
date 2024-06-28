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

// route untuk bagian home page

route::get('/',[HomeController::class,'index']); // Menampilkan halaman utama

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
    return view('dashboard'); // Menampilkan dashboard, hanya untuk pengguna yang terautentikasi
})->name('dashboard');
route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified'); // Mengarahkan pengguna setelah login
route::get('/product_details/{id}',[HomeController::class,'product_details']); // Menampilkan detail produk berdasarkan ID
route::post('/add_cart/{id}',[HomeController::class,'add_cart']); // Menambahkan produk ke cart berdasarkan ID
route::get('/show_cart',[HomeController::class,'show_cart']); // Menampilkan isi cart 
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']); // Menghapus produk dari cart berdasarkan ID
route::get('/cash_order',[HomeController::class,'cash_order']); // Memproses pesanan cod/transfer
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']); // Menampilkan halaman pembayaran stripe dengan total harga
Route::post('stripe/{totalprice}', [HomeController::class,'stripePost'])->name('stripe.post'); // Memproses pembayaran stripe
route::get('/show_order',[HomeController::class,'show_order']); // Menampilkan pesanan customer
route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']); // Membatalkan pesanan berdasarkan ID
route::post('/add_comment',[HomeController::class,'add_comment']); // Menambahkan komentar
route::post('/add_reply',[HomeController::class,'add_reply']);// Menambahkan reply komentar
Route::post('like_comment', [HomeController::class, 'likeComment']); // Fitur menyukai komentar
Route::post('delete_comment', [HomeController::class, 'deleteComment']); // Untuk Menghapus komentar 
Route::get('search_product', [HomeController::class, 'search_product']); // Untuk mencari product
Route::get('delete_order/{id}', [HomeController::class, 'delete_order'])->name('delete_order'); // Menghapus pesanan berdasarkan ID



// route untuk bagian admin page

route::get('/category',[AdminController::class,'category']); // Menampilkan kategori
route::post('/add_category',[AdminController::class,'add_category']); // Untuk Menambahkan kategori
route::get('/delete_category/{id}',[AdminController::class,'delete_category']); // Untuk Menghapus kategori berdasarkan ID
route::get('/view_product',[AdminController::class,'view_product']); // Halaman untuk melihat produk
route::post('/add_product',[AdminController::class,'add_product']); // Untuk menambahkan produk baru
route::get('/show_product',[AdminController::class,'show_product']); // Untuk melihat produk
route::get('/delete_product/{id}',[AdminController::class,'delete_product']);  // Untuk delete produk berdasarkan ID
route::get('/update_product/{id}',[AdminController::class,'update_product']); // Untuk update product berdasarkan ID
route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']); // Untuk mengonfirmasi pembaruan produk berdasarkan ID
route::get('/order',[AdminController::class,'order']); // Menampilkan semua pesanan
route::get('/delivered/{id}',[AdminController::class,'delivered']); // Menandai pesanan sebagai sudah dikirim berdasarkan ID
route::get('/print/{id}',[AdminController::class,'print']); // Untuk print pesanan berdasarkan ID
route::get('/email/{id}',[AdminController::class,'email']); // Menampilkan halaman email untuk pengguna berdasarkan ID
route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']); // Mengirim email ke pengguna berdasarkan ID
route::get('/search',[AdminController::class,'searchdata']); // Mencari data product dalam halaman admin
Route::get('admin/delivered/{id}', [AdminController::class, 'delivered'])->name('admin.delivered'); // Menandai pesanan yang sudah dikirim berdasarkan ID
Route::delete('/deleteOrder/{id}', 'App\Http\Controllers\AdminController@deleteOrder')->name('admin.deleteOrder'); // Menghapus pesanan berdasarkan ID
Route::get('sort', [AdminController::class, 'sortOrders'])->name('admin.sortOrders'); // Mengurutkan pesanan
Route::get('sortByName', [AdminController::class, 'sortByName'])->name('admin.sortByName'); // Mengurutkan pesanan berdasarkan nama
Route::get('filter-by-delivery-status', [AdminController::class, 'filterByDeliveryStatus'])->name('admin.filterByDeliveryStatus'); // Memfilter pesanan berdasarkan status pengiriman
