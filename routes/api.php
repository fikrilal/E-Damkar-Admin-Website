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

    
    
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});

Route::get('/getPelaporan/{userId}', [LaporanController::class, 'getDataPelaporan']);
Route::get('/getDetailLap/{idLaporan}', [LaporanController::class, 'getDetailPelaporan']);
Route::post('/addPelaporan', [LaporanController::class, 'AddPelaporan']);
Route::get('/beritaTerbaru', [ArtikelBeritaController::class, 'newArtikelBerita']);
Route::get('/userData', [UserController::class, 'index']);

Route::get('/getBerita/{value}', [ArtikelBeritaController::class, 'newArtikelBerita']);
Route::get('/verification/{noHp}', [AuthenticationController::class, 'verfikasiRegister']);
Route::post('/verification/{noHp}', [AuthenticationController::class, 'postVerification']);
Route::get('/getNoHp/{text}', [AuthenticationController::class, 'getNoHp']);
Route::get('/getBerita', [ArtikelBeritaController::class, 'newArtikelBerita']);

Route::get('/getBeritaHigh', [ArtikelBeritaController::class, 'getArtikelHighlight']);

Route::get('/searchLapp', [ArtikelBeritaController::class, 'getArtikelHighlight']);
Route::get('/getDetailBerita/{idBerita}', [ArtikelBeritaController::class, 'detailBerita']);
Route::get('/searchLapp/{userId}/{text}', [LaporanController::class, 'searchLapKategori']);

Route::get('/filterLapMenunggu/{userId}', [LaporanController::class, 'filterLapMenunggu']);
Route::get('/filterLapProses/{userId}', [LaporanController::class, 'filterLapProses']);
Route::get('/filterLapSelesai/{userId}', [LaporanController::class, 'filterLapSelesai']);
Route::get('/filterLapDitolak/{userId}', [LaporanController::class, 'filterLapDitolak']);



Route::post('/user/password', [UserController::class, 'updatePassword']);
Route::post('/user', [UserController::class, 'updateProfil']);
Route::post('/user/foto', [UserController::class, 'UpdateFile']);
Route::get('/user/akun', [UserController::class, 'getDataProfile']);
