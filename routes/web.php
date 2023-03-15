<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
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
})->middleware('auth');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/petugas', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/siswa', function () {
    return view('siswa.index');
})->middleware('auth');

Route::group(['prefix'=>'auth'], function ($router) {
    Route::get('/register', [AuthController::class, 'viewregister']);
    Route::post('/postregister', [AuthController::class, 'register'])->name('register.post');
    Route::get('/login', [AuthController::class, 'viewlogin'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'login'])->name('login.post');
});

// Data Petugas 
Route::resource('data-petugas', DataPetugasController::class)->middleware('auth'); 
// End Data Petugas

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