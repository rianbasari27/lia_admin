<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReparasiController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\TransaksiMasukController;
use App\Http\Controllers\TransaksiKeluarController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/reparasi/create/customer', [CustomerController::class, 'create'])->middleware('auth');
Route::post('/reparasi/create/customer', [CustomerController::class, 'store'])->middleware('auth');
Route::resource('/reparasi', ReparasiController::class)->middleware('auth');
Route::resource('/pembelian_sparepart', PembelianController::class)->middleware('auth');
Route::resource('/list_sparepart', SparepartController::class)->middleware('auth');
Route::resource('/transaksi_keluar', TransaksiKeluarController::class)->middleware('auth');
Route::resource('/transaksi_masuk', TransaksiMasukController::class)->middleware('auth');
