<?php

use App\Http\Controllers\RestAPI\ArtikelBeritaController;
use App\Http\Controllers\RestAPI\AuthenticationController;
use App\Http\Controllers\RestAPI\LaporanController;
use App\Http\Controllers\RestAPI\UserController;
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
Route::post('/changepass/{noHp}', [AuthenticationController::class, 'changePassword']);
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

Route::get('/semuaArtikel', [ArtikelBeritaController::class, 'semuaArtikel']);
Route::post('/user', [UserController::class, 'updateProfil']);
<<<<<<< HEAD
Route::post('/sendToWa', [LaporanController::class, 'sendInfoToWhatsapp']);
Route::post('/addImage', [LaporanController::class, 'addImage']);
=======
Route::post('/user/foto', [UserController::class, 'UpdateFile']);
Route::get('/user/akun', [UserController::class, 'getDataProfile']);
>>>>>>> be2e88e90e0297ed7270ff1841c6859fa1229329
