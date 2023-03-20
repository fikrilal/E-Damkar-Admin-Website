<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\Controller;

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

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/home', [HomeController::class, 'home']);

Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function() {
    Route::resource('home', 'HomeController');
});

Route::group(['namespace' => 'App\Http\Controllers\Backend'], function() {
    Route::resource('dashboard', 'DashboardController');
});

// Route::get('/user', [ManagementUserController::class, 'index']);
// Route::get('/user/create', [ManagementUserController::class, 'create']);
// Route::get('/user/store', [ManagementUserController::class, 'store']);
// Route::get('/user/{id}/show', [ManagementUserController::class, 'show']);
// Route::get('/user/{id}/edit', [ManagementUserController::class, 'edit']);
// Route::get('/user/{id}/update', [ManagementUserController::class, 'update']);
// Route::get('/user/{id}/destroy', [ManagementUserController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa', function () {
    return "<h1>Halo masbro <h1>";
});

Route::get('/siswa/{id}', function ($id) {
    return "<h1>Halo masbro, usia masbro adalah $id tahun<h1>";
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
