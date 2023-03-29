<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\projectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\suratjlnController;
use Illuminate\Routing\RouteGroup;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('/project', 'App\Http\Controllers\projectController')->middleware('auth');
Route::resource('/pelanggan', 'App\Http\Controllers\pelangganController')->middleware('auth');
Route::resource('/suratjln', 'App\Http\Controllers\suratjlnController')->middleware('auth');
Route::resource('/invoice', 'App\Http\Controllers\invoiceController')->middleware('auth');
Route::resource('/transaksi', 'App\Http\Controllers\transaksiController')->middleware('auth');
Route::resource('/laporan', 'App\Http\Controllers\laporanController')->middleware('auth');
Route::resource('/user', 'App\Http\Controllers\UserController')->middleware('auth');

Route::get('/suratjln', [suratjlnController::class, 'index'])->middleware('auth');
Route::get('/suratjln/create', [suratjlnController::class, 'create'])->middleware('auth');
Route::get('/suratjln/{suratjln}', [suratjlnController::class, 'show'])->middleware('auth');
Route::post('/suratjln', [suratjlnController::class, 'store'])->middleware('auth');
Route::put('/suratjln/{suratjln}', [suratjlnController::class, 'update'])->middleware('auth');
Route::get('/suratjln/{suratjln}/edit', [suratjlnController::class, 'edit'])->middleware('auth');
Route::delete('/suratjln/{suratjln}', [suratjlnController::class, 'destroy'])->middleware('auth');
Route::get('/suratjln/print/{suratjln}', [suratjlnController::class, 'print'])->name('print')->middleware('auth');
Route::get('/invoice/print/{transaksi}', [invoiceController::class, 'print'])->name('print')->middleware('auth');

// cetak laporan pertanggal
Route::get('laporan', [laporanController::class, 'index'])->middleware('auth');
Route::post('laporan', [laporanController::class, 'store'])->middleware('auth');
Route::get('/laporan/cetak/{transaksi}', [laporanController::class, 'cetak'])->name('cetak')->middleware('auth');
Route::get('laporan/{laporan}', [laporanController::class, 'show'])->middleware('auth');
Route::get('/CetakDataPerTanggal/{tglawal}/{tglakhir}', [laporanController::class, 'CetakDataPerTanggal'])->middleware('auth');


//Route search
Route::get('/search', [projectController::class, 'search'])->name('search');
Route::get('/search', [pelangganController::class, 'search'])->name('search');
Route::get('/search', [UserController::class, 'search'])->name('search');
Route::get('/search', [invoiceController::class, 'search'])->name('search');
Route::get('/search', [transaksikeluarController::class, 'search'])->name('search');
Route::get('/search', [suratjlnController::class, 'search'])->name('search');
