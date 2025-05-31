<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Cpembeli;
use App\Http\Controllers\Csuplier;
use App\Http\Controllers\Cpesanan;
use App\Http\Controllers\Cpembelian;
use App\Http\Controllers\Cdashboard;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\Cprofile;

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
// Route URL /
Route::get('/', function () {
    return view('auth.login');
});

// Route Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard.index', [Cdashboard::class, 'index'])->name('dashboard.index');
// Route Barang + Nyetak + Export
Route::resource('barang', Cbarang::class)->except(['show']);
Route::get('/barang/cetak', [Cbarang::class, 'cetak'])->name('barang.cetak');
Route::get('/barang/excel', [Cbarang::class, 'excel'])->name('barang.excel');

// Route Pembeli + Nyetak + Export
Route::resource('pembeli', Cpembeli::class)->except(['show']);
Route::get('/pembeli/cetak', [Cpembeli::class, 'cetak'])->name('pembeli.cetak');
Route::get('/pembeli/excel', [Cpembeli::class, 'excel'])->name('pembeli.excel');

// Route Suplier + Nyetak + Export
Route::resource('suplier', Csuplier::class)->except(['show']);
Route::get('/suplier/cetak', [Csuplier::class, 'cetak'])->name('suplier.cetak');
Route::get('/suplier/excel', [Csuplier::class, 'excel'])->name('suplier.excel');

// Route::get('/suplier', [Csuplier::class, 'index'])->name('suplier.index');
// Route::get('/suplier/create', [Csuplier::class, 'create'])->name('suplier.create');
// Route::post('/suplier/store', [Csuplier::class, 'store'])->name('suplier.store');
// Route::get('/suplier/{id_suplier}/edit', [Csuplier::class, 'edit'])->name('suplier.edit');
// Route::put('/suplier/{id_suplier}/update', [Csuplier::class, 'update'])->name('suplier.update');
// Route::delete('/suplier/{id_suplier}/delete', [Csuplier::class, 'delete'])->name('suplier.delete');

// Route Pesanan + Nyetak + Export
Route::resource('pesanan', Cpesanan::class)->except(['show']);
Route::get('/pesanan/cetak', [Cpesanan::class, 'cetak'])->name('pesanan.cetak');
Route::get('/pesanan/excel', [Cpesanan::class, 'excel'])->name('pesanan.excel');

// Route::get('/pesanan', [Cpesanan::class, 'index'])->name('pesanan.index');
// Route::get('/pesanan/create', [Cpesanan::class, 'create'])->name('pesanan.create');
// Route::post('/pesanan/store', [Cpesanan::class, 'store'])->name('pesanan.store');
// Route::get('/pesanan/{id}/edit', [Cpesanan::class, 'edit'])->name('pesanan.edit');
// Route::put('/pesanan/{id}/update', [Cpesanan::class, 'update'])->name('pesanan.update');
// Route::delete('/pesanan/{id}/delete', [Cpesanan::class, 'delete'])->name('pesanan.delete');

// Route Pembelian + Nyetak + Export
Route::resource('pembelian', Cpembelian::class)->except(['show']);
Route::get('/pembelian/cetak', [Cpembelian::class, 'cetak'])->name('pembelian.cetak');
Route::get('/pembelian/excel', [Cpembelian::class, 'excel'])->name('pembelian.excel');

// Route::get('/pembelian', [Cpembelian::class, 'index'])->name('pembelian.index');
// Route::get('/pembelian/create', [Cpembelian::class, 'create'])->name('pembelian.create');
// Route::post('/pembelian/store', [Cpembelian::class, 'store'])->name('pembelian.store');
// Route::get('/pembelian/{id}/edit', [Cpembelian::class, 'edit'])->name('pembelian.edit');
// Route::put('/pembelian/{id}', [Cpembelian::class, 'update'])->name('pembelian.update');
// Route::delete('/pembelian/{id}/delete', [Cpembelian::class, 'delete'])->name('pembelian.delete');

// Route Login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Clogin::class, 'index'])->name('login');
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
});

Route::get('/home', function () {
    return redirect('dashboard');
})->name('home');

// Route Logout
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [Clogin::class, 'logout'])->name('logout');
    Route::get('/dashboard', [Cdashboard::class, 'index'])->name('dashboard');
    // Route::resource('/siswa', Csiswa::class);
});

// Route Izin Level
Route::middleware(['auth'])->group(function () {

    Route::middleware(['cek_level:admin'])->group(function () {
        Route::resource('barang', Cbarang::class);
        Route::resource('pembelian', Cpembelian::class);
        Route::resource('pesanan', Cpesanan::class);
        Route::resource('suplier', Csuplier::class);
        Route::resource('pembeli', Cpembeli::class);
    });
    Route::middleware(['cek_level:admin,user'])->group(function () {
        Route::resource('pembeli', Cpembeli::class);
    });
    Route::middleware(['cek_level:admin,suplier'])->group(function () {
        Route::resource('suplier', Csuplier::class);
    });

});

// Route Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [Cprofile::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [Cprofile::class, 'update'])->name('profile.update');
});