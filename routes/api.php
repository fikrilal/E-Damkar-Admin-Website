<?php

use App\Http\Controllers\RestAPI\ArtikelBeritaController;
use App\Http\Controllers\RestAPI\AuthenticationController;
use App\Http\Controllers\RestAPI\LaporanController;
use App\Http\Controllers\RestAPI\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', [UserController::class, 'checkLogin']);

    Route::get('/getPelaporan/{userId}', [LaporanController::class, 'getDataPelaporan']);
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::post('/addPelaporan', [LaporanController::class, 'AddPelaporan']);

});

Route::get('/beritaTerbaru', [ArtikelBeritaController::class, 'newArtikelBerita']);
Route::get('/userData', [UserController::class, 'index']);
Route::get('/getBerita/{value}', [ArtikelBeritaController::class, 'newArtikelBerita']);

Route::get('/getBeritaSkip/{value}', [ArtikelBeritaController::class, 'getBeritaSkip']);


