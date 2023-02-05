<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Pelaporan;

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
    $pelaporans = Pelaporan::get();
    return view('frontend.layouts', compact('pelaporans'));
});

Auth::routes(['register'=>false]);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::resource('siswa', 'SiswaController');

Route::get('/search', 'SiswaController@cari');

Route::resource('kategori', 'KategoriController')->middleware('auth');

Route::resource('pelaporan', 'PelaporanController');

Route::resource('aspirasi', 'AspirasiController')->middleware('auth');

Route::get('/profil', 'PelaporanController@profile')->name('profile');

Route::get('/laporan', 'PelaporanController@laporan')->middleware('auth');

Route::get('/laporan/cetak', 'PelaporanController@pdf')->middleware('auth');
