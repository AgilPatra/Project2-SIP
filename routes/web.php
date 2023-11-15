<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
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
    return view('welcome');
});

//Admin
//Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'admin_dashboard']);
//Buku
Route::get('/admin/buku', [BukuController::class, 'admin_get_buku']);
Route::post('/admin/simpan-buku', [BukuController::class, 'admin_store_buku']);
Route::put('/admin/edit-buku/{id}', [BukuController::class, 'admin_edit_buku'])->name('admin_update_buku');
Route::delete('/admin/hapus-buku/{id}', [BukuController::class, 'admin_destroy_buku'])->name('admin_destroy_buku');
//Peminjaman
Route::get('/admin/peminjaman', [PeminjamanController::class, 'admin_get_peminjaman']);

//Anggota
Route::get('/admin/anggota', [AnggotaController::class, 'admin_get_anggota']);

//Anggota
Route::get('/anggota/dashboard', [DashboardController::class, 'anggota_dashboard']);
Route::get('/anggota/ketersediaan-buku', [BukuController::class, 'anggota_get_ketersediaan_buku']);
Route::get('/anggota/riwayat-peminjaman-buku', [PeminjamanController::class, 'anggota_get_riwayat_peminjaman']);
