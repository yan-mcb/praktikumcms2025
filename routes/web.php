<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

Route::get('/', [ProdukController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('produk', ProdukController::class)->except(['index']);
    Route::resource('transaksi', TransaksiController::class);
});


Route::get('/', function () {
    return view('welcome');
});
