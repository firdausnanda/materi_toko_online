<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\master\ProdukController;
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

Route::get('/', function () {
    return view('welcome');
});

// Practice Route

Route::get('/hello', function() {
    return 'Nama Saya Aan!';
});

Route::redirect('/nama', '/hello');

Route::fallback(function() {
    return 'Halaman ini tidak ada!';
});

Route::get('/conflict/nokia', function() {
    return 'Nama barang saya nokia';
});

Route::get('/items/{merk}', function($id) {
    return $id;
});

Route::get('/conflict/{nama}', function($namaitem) {
    return 'Nama Barang : ' . $namaitem;
});

// Route::get('/produk', [ItemController::class, 'item']);

// View

// Route Produk
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produklist', [ProdukController::class, 'productlist']);

// Route Customer
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer-create', [CustomerController::class, 'create']);
Route::post('/customer-store', [CustomerController::class, 'store']);
Route::get('/customer-edit/{id}', [CustomerController::class, 'edit']);
Route::put('/customer-update', [CustomerController::class, 'update']);
Route::get('/customer-delete/{id}', [CustomerController::class, 'delete']);