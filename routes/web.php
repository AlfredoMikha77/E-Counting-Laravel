<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyediaController;
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