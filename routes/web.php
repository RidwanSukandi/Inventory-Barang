<?php

use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\BarangMasukController;
use App\Models\BarangMasuk;
// use App\Models\BarangMasuk;
// use App\Models\Satuan;
// use App\Models\Stock;
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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/data-pengguna', [UserControler::class, 'index']);
Route::post('/data-pengguna', [UserControler::class, 'post'])->name('post');
Route::get('/data-pengguna/{id}', [UserControler::class, 'edit'])->name('user.edit');
Route::put('/data-pengguna/{id}', [UserControler::class, 'update'])->name('user.update');
Route::delete('/data-pengguna/{id}', [UserControler::class, 'destroy'])->name('user.delete');

Route::get('/stock', [StockController::class, 'index']);
Route::get('/stock/create', [StockController::class, 'create']);
Route::get('/stock/update/{id}', [StockController::class, 'edit']);
Route::post('/stock/create', [StockController::class, 'store'])->name('stock.store');
Route::put('/stock/update/{id}', [StockController::class, 'update'])->name('stock.update');
Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');

Route::get('/jenis-barang', [JenisBarangController::class, 'index']);
Route::get('/jenis-barang/create', [JenisBarangController::class, 'create']);
Route::get('/jenis-barang/update/{id}', [JenisBarangController::class, 'edit']);
Route::post('/jenis-barang/create', [JenisBarangController::class, 'store'])->name('jenis-barang.store');
Route::put('/jenis-barang/edit/{id}', [JenisBarangController::class, 'update']);
Route::delete('/jenis-barang/delete/{id}', [JenisBarangController::class, 'destroy'])->name('jenis-barang.destroy');


Route::get('/satuan', [SatuanController::class, 'index']);
Route::get('/satuan/create', [SatuanController::class, 'create']);
Route::get('/satuan/update/{id}', [SatuanController::class, 'edit']);
Route::post('/satuan/create', [SatuanController::class, 'store'])->name('satuan.store');
Route::put('/satuan/edit/{id}', [SatuanController::class, 'update']);
Route::delete('/satuan/delete/{id}', [SatuanController::class, 'destroy'])->name('satuan.destroy');


Route::get('/barang-masuk', [BarangMasukController::class, 'index']);
Route::get('/barang-masuk/create', [BarangMasukController::class, 'create']);
Route::post('/barang-masuk/create', [BarangMasukController::class, 'store'])->name('barangMasuk.store');
Route::delete('/barang-masuk/delete/{id}', [BarangMasukController::class, 'destroy'])->name('satuan.destroy');

Route::get('/barang-keluar', [BarangKeluarController::class, 'index']);
Route::get('/barang-keluar/create', [BarangKeluarController::class, 'create']);
Route::post('/barang-keluar/create', [BarangKeluarController::class, 'store'])->name('barangKeluar.store');
