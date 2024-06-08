<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\TransaksiPenyediaController;
use App\Http\Controllers\LayananController;
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


Route::get('/penyedia', [PenyediaController::class, 'index']);
Route::get('/penyedia/tambah', [PenyediaController::class, 'create']);
Route::post('/penyedia/store', [PenyediaController::class, 'store']);
Route::get('/penyedia/edit/{id_penyedia}', [PenyediaController::class, 'edit']);
Route::put('/penyedia/update/{id_penyedia}', [PenyediaController::class, 'update']);
Route::get('/penyedia/hapus/{id_penyedia}', [PenyediaController::class, 'delete']);
Route::delete('/penyedia/destroy/{id_penyedia}', [PenyediaController::class, 'destroy']);

// Rute untuk Transaksi Penyedia
Route::get('/transaksi-penyedia', [TransaksiPenyediaController::class, 'index']);
Route::get('/transaksi-penyedia/tambah', [TransaksiPenyediaController::class, 'create']);
Route::post('/transaksi-penyedia/store', [TransaksiPenyediaController::class, 'store']);
Route::get('/transaksi-penyedia/cetak', [TransaksiPenyediaController::class, 'cetakPdf']);

Route::get('/layanan', [LayananController::class, 'index']);
Route::get('/layanan/create', [LayananController::class, 'create']);
Route::post('/layanan/store', [LayananController::class, 'store']);
Route::get('/layanan/edit/{id}', [LayananController::class, 'edit']);
Route::post('/layanan/update/{id}', [LayananController::class, 'update']);
Route::delete('/layanan/{id}', [LayananController::class, 'destroy']);
Route::get('/layanan/cetak', [LayananController::class, 'cetakPdf']);