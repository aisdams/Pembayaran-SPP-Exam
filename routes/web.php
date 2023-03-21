<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DataPetugasController;

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
    return view('global.index');
});

Route::get('history-pembayaran', [PembayaranController::class, 'history'])->name('history-pembayaran');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/petugas', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/siswa', function () {
    return view('siswa.index');
})->middleware('auth');

// Laporan Pembayaran
Route::get('/laporan/all-data-laporan',[PembayaranController::class,'LaporanSemua'])->middleware('auth');
Route::get('/tampilan-laporan', function () {
    return view('admin.laporan.main');
})->middleware('auth');
Route::get('/laporan-tanggal', [PembayaranController::class, 'laporan'])->name('laporan')->middleware('auth');

Route::get('/history-siswa', [PembayaranController::class, 'getHistoryPembayaranSiswa'])->name('history.siswa')->middleware('auth');
// End Laporan Pembayaran

// =================== Export PDF =================== //
Route::get('/pembayaran-pdf/{id}', [PembayaranController::class, 'cetakLaporanPDF'])->name('cetak-laporan-pdf');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['prefix'=>'auth'], function ($router) {
    Route::get('/register', [AuthController::class, 'viewregister']);
    Route::post('/postregister', [AuthController::class, 'register'])->name('register.post');
    Route::get('/login', [AuthController::class, 'viewlogin'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'login'])->name('login.post');
});

// Data Petugas 
Route::resource('data-petugas', DataPetugasController::class)->middleware('auth');
// End Data Petugas

// Data Kelas
Route::resource('data-kelas', KelasController::class)->middleware('auth');
// End Data Kelas

// Data Siswa
Route::resource('data-siswa', DataSiswaController::class)->middleware('auth');
// End Data Siswa

// Data SPP
Route::resource('data-spp', SppController::class)->middleware('auth');
// End Data SPP

// Data Pembayaran
Route::resource('data-pembayaran', PembayaranController::class)->middleware('auth');
// End Data Pembayaran

// check Role User
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['login:admin']], function () {
        Route::get('admin', [AdminController::class, 'index'])->name('admin');
    });
    Route::group(['middleware' => ['login:petugas']], function () {
        Route::get('petugas', [PetugasController::class, 'index'])->name('petugas');
    });
    Route::group(['middleware' => ['login:siswa']], function () {
        Route::get('siswa', [SiswaController::class, 'index'])->name('siswa');
    });
});