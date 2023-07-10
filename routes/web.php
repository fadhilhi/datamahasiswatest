<?php

use App\Http\Controllers\DataMahasiswaController;
use App\Http\Controllers\DataMatakuliahController;
use App\Http\Controllers\DataProdiController;
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

// Daftar Data Program Studi 
Route::get('dataprodi', [DataProdiController::class, 'index']);
Route::post('dataprodi', [DataProdiController::class, 'store']);
Route::get('dataprodi/{id}/edit', [DataProdiController::class, 'edit']);
Route::put('dataprodi/{id}', [DataProdiController::class, 'update']);
Route::delete('dataprodi/{id}', [DataProdiController::class, 'destroy']);

// Daftar Data Mata Kuliah 
Route::get('datamatkul', [DataMatakuliahController::class, 'index']);
Route::post('datamatkul', [DataMatakuliahController::class, 'store']);
Route::get('datamatkul/{id}/edit', [DataMatakuliahController::class, 'edit']);
Route::put('datamatkul/{id}', [DataMatakuliahController::class, 'update']);
Route::delete('datamatkul/{id}', [DataMatakuliahController::class, 'destroy']);

// Daftar Data Mahasiswa
Route::get('datamahasiswa', [DataMahasiswaController::class, 'index']);
Route::post('datamahasiswa', [DataMahasiswaController::class, 'store']);
Route::get('datamahasiswa/{id}/edit', [DataMahasiswaController::class, 'edit']);
Route::put('datamahasiswa/{id}', [DataMahasiswaController::class, 'update']);
Route::delete('datamahasiswa/{id}', [DataMahasiswaController::class, 'destroy']);