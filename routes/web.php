<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ObatPerlengkapanController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\AuthController;

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

//data
Route::get('/', [AdminController::class, 'index'])->middleware('admin');
Route::get('/data_dokter', [AdminController::class, 'data_dokter'])->middleware('admin');
Route::get('/data_pasien', [AdminController::class, 'data_pasien'])->middleware('admin');
Route::get('/poliklinik', [AdminController::class, 'poliklinik'])->middleware('admin');
Route::get('/rekam_medis', [AdminController::class, 'rekam_medis'])->middleware('admin');
Route::get('/obat_perlengkapan', [AdminController::class, 'obat_perlengkapan'])->middleware('admin');

//CRUD dokter
Route::get('/tambah_dokter', [DokterController::class, 'tambah_dokter'])->middleware('admin');
Route::post('/store_dokter', [DokterController::class, 'store_dokter'])->middleware('admin');
Route::post('/hapus_dokter', [DokterController::class, 'hapus_dokter'])->middleware('admin');
Route::get('/edit_dokter/{id}', [DokterController::class, 'edit_dokter'])->middleware('admin');
Route::post('/update_dokter', [DokterController::class, 'update_dokter'])->middleware('admin');
Route::post('/cari_dokter', [DokterController::class, 'cari_dokter']);

//crud pasien
Route::get('/tambah_pasien', [PasienController::class, 'tambah_pasien'])->middleware('admin');
Route::post('/store_pasien', [PasienController::class, 'store_pasien'])->middleware('admin');
Route::post('/hapus_pasien', [PasienController::class, 'hapus_pasien'])->middleware('admin');
Route::get('/edit_pasien/{id}', [PasienController::class, 'edit_pasien'])->middleware('admin');
Route::post('/update_pasien', [PasienController::class, 'update_pasien'])->middleware('admin');

//crud poliklinik
Route::get('/tambah_poliklinik', [PoliklinikController::class, 'tambah_poliklinik'])->middleware('admin');
Route::post('/store_poliklinik', [PoliklinikController::class, 'store_poliklinik'])->middleware('admin');
Route::post('/hapus_poliklinik', [PoliklinikController::class, 'hapus_poliklinik'])->middleware('admin');
Route::get('/edit_poliklinik/{id}', [PoliklinikController::class, 'edit_poliklinik'])->middleware('admin');
Route::post('/update_poliklinik', [PoliklinikController::class, 'update_poliklinik'])->middleware('admin');
Route::post('/cari_poliklinik', [PoliklinikController::class, 'cari_poliklinik']);

//crud 
Route::get('/tambah_rekammedis', [RekamMedisController::class, 'tambah_rekammedis'])->middleware('admin');
Route::post('/store_rekammedis', [RekamMedisController::class, 'store_rekammedis'])->middleware('admin');
Route::get('/edit_rekammedis/{id}', [RekamMedisController::class, 'edit_rekammedis'])->middleware('admin');
Route::post('/hapus_rekammedis', [RekamMedisController::class, 'hapus_rekammedis'])->middleware('admin');
Route::post('/update_rekammedis', [RekamMedisController::class, 'update_rekammedis'])->middleware('admin');
Route::post('/cari_rekammedis', [RekamMedisController::class, 'cari_rekammedis']);

//crud perlengkapan dan obat 
Route::get('/tambah_obat', [ObatPerlengkapanController::class, 'tambah_obat'])->middleware('admin');
Route::post('/store_obat', [ObatPerlengkapanController::class, 'store_obat'])->middleware('admin');
Route::post('/hapus_obat', [ObatPerlengkapanController::class, 'hapus_obat'])->middleware('admin');
Route::get('/edit_obat/{id}', [ObatPerlengkapanController::class, 'edit_obat'])->middleware('admin');
Route::post('/update_obat', [ObatPerlengkapanController::class, 'update_obat'])->middleware('admin');
Route::post('/cari_obat', [ObatPerlengkapanController::class, 'cari_obat']);

Route::get('/join', [ObatPerlengkapanController::class, 'join'])->middleware('admin');

//autentikasi
Route::get('/register', [AuthController::class, 'register']);
Route::post('/store_register', [AuthController::class, 'store_register']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/store_login', [AuthController::class, 'store_login']);
Route::get('/logout', [AuthController::class, 'logout']);