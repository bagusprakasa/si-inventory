<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\GuideDriverController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\VendorController;

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
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('satuan', SatuanController::class);
    Route::resource('produk', ProdukController::class);
    Route::get('/ajax-barang-keluar', [BarangKeluarController::class, 'ajaxSelect']);
    Route::resource('barang-keluar', BarangKeluarController::class);
    Route::resource('barang-masuk', BarangMasukController::class);
    Route::resource('guide-driver', GuideDriverController::class);
    Route::resource('kategori_produk', KategoriProdukController::class);
    Route::resource('vendor', VendorController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
