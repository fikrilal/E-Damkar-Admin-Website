<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\CheckKedudukanMiddleware;
use App\Http\Controllers\WelcomeController;

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

Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function() {
    Route::resource('home', 'HomeController');
});

Route::group(['namespace' => 'App\Http\Controllers\Backend'], function() {
    Route::resource('dashboard', 'DashboardController');
    Route::resource('laporan', 'LaporanController');
    Route::resource('laporanmasuk', 'LaporanMasukController');
    Route::resource('pengaturan', 'PengaturanController');
    Route::resource('berita', 'BeritaController');
    Route::resource('edukasi', 'EdukasiController');
    Route::resource('agenda', 'AgendaController');
    Route::middleware([CheckKedudukanMiddleware::class])->group(function () {
    Route::resource('kelolaadmin', 'AdminController');
    });
});

Route::get('/search', 'App\Http\Controllers\SearchBeritaController@search')->name('search');

Route::get('/laporan/update-status/{id}/', 'App\Http\Controllers\Backend\LaporanMasukController@updateStatus')->name('laporan.update-status');

Route::get('/logout', function(){
    Auth::logout();
    // return Redirect::to('login');
 });

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['namespace' => 'App\Http\Controllers\LandingInformasi'], function () {
    Route::resource('landingberita', 'landingberitaController');
    Route::resource('landingedukasi', 'landingedukasiController');
    Route::resource('landingagenda', 'landingagendaController');
    Route::resource('detailberita', 'detailberitaController');
    Route::resource('detailagenda', 'detailagendaController');
    Route::resource('detailedukasi', 'detailedukasiController');
    Route::resource('landingtentang', 'landingtentangController');
    Route::get('detailberita/{id_berita}', [LandingInformasiController::class, 'show'])->name('detailberita.show');
    Route::get('detailedukasi/{id_edukasi}', [LandingInformasiController::class, 'show'])->name('detailedukasi.show');
    Route::get('detailagenda/{id_agenda}', [LandingInformasiController::class, 'show'])->name('detailagenda.show');
});


Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');