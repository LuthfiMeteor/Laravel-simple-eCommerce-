<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TampilController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\kategoriController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\KeranjangController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', [FrontController::class, 'index']);
route::get('category', [FrontController::class, 'category']);
route::get('lihat-kategori/{slug}', [FrontController::class, 'lihatkategori']);
route::get('lihat-kategori/{cate_slug}/{prod_slug}', [FrontController::class, 'lihatproduk']);
Auth::routes();
route::post('/tambah-ke-keranjang', [FrontController::class, 'tambahproduk']);
route::post('/hapus-dari-keranjang', [KeranjangController::class, 'hapusdarikeranjang']);
route::post('update-keranjang', [KeranjangController::class, 'updatekeranjang']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    route::get('keranjang', [KeranjangController::class, 'lihatkeranjang']);
    route::get('checkout', [CheckoutController::class, 'index']);
    route::post('place-order', [CheckoutController::class, 'placeorder']);

    route::get('transaksi-saya',[UserController::class, 'index']);
    route::get('lihat-order/{id}',[UserController::class, 'lihat']);
});


Route::middleware(['auth', 'jikaadmin'])->group(function () {
    route::get('/dashboard', [TampilController::class, 'index']);
    // KATEGORI
    route::get('/kategori', [kategoriController::class, 'index']);
    route::get('tambah-kategori', [kategoriController::class, 'tambah']);
    route::post('masukan-kategori', [kategoriController::class, 'insert']);
    Route::get('edit-kategori/{id}', [kategoriController::class, 'edit']);
    Route::put('edit-kategori/proses/{id}', [kategoriController::class, 'update']);
    Route::delete('hapus-kategori/{id}', [kategoriController::class, 'destroy']);
    // PRODUK
    Route::get('products', [ProductController::class, 'index']);
    route::get('tambah-produk', [ProductController::class, 'tambah']);
    route::post('masukan-produk', [ProductController::class,'insert']);
    Route::get('edit-produk/{id}', [ProductController::class, 'edit']);
    Route::put('edit-produk/proses/{id}', [ProductController::class, 'update']);
    Route::delete('hapus-produk/{id}', [ProductController::class, 'destroy']);
});
