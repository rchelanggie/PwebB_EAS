<?php

use App\Http\Controllers\BerkasController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KartuUjianController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PosisiController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {return view('users.index');});
Route::resource('data_diri', DataController::class);
Route::resource('data_berkas', BerkasController::class);
Route::resource('kartu_ujian', KartuUjianController::class);
Route::resource('data_posisi', PosisiController::class);
Route::resource('data_lokasi', LokasiController::class);
Route::get('createPDF', [KartuUjianController::class, 'createPDF'])->name('createPDF');
Route::get('/dokumen/{nama_dokumen}', [BerkasController::class, 'download'])->name('dokumen');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('admin', [UserController::class, 'admin'])->name('admin');