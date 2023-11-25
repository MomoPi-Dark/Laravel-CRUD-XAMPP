<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KependudukanController;

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
    return redirect('/mahasiswa');
});

// MAHASISWA
Route::get('/mahasiswa', [MahasiswaController::class, 'home_mahasiswa']);
Route::get('/mahasiswa/cetak_pdf', [MahasiswaController::class, 'downloadPDF']);
Route::get('/mahasiswa/cetak_excel', [MahasiswaController::class, 'downloadExcel']);
Route::get('/mahasiswa/add', [MahasiswaController::class, 'show_add']);
Route::post('/mahasiswa/store', [MahasiswaController::class, 'save']);
Route::get('/mahasiswa/edit/{nim}', [MahasiswaController::class, 'show_edit']);
Route::post('/mahasiswa/edit_data', [MahasiswaController::class, 'edit_data']);
Route::get('/mahasiswa/delete/{nim}', [MahasiswaController::class, 'delete']);
