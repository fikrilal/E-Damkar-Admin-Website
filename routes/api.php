<?php

use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\RestAPI\ArtikelBeritaController;
use App\Http\Controllers\RestAPI\ArtikelController;
use App\Http\Controllers\RestAPI\AuthenticationController;
use App\Http\Controllers\RestAPI\EdukasiController as RestAPIEdukasiController;
use App\Http\Controllers\RestAPI\LaporanController;
use App\Http\Controllers\RestAPI\petugasController;
use App\Http\Controllers\RestAPI\UserController;
use App\Websocket\LaporanHandler\MessageLaporanHandler;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/loginPetugas', [AuthenticationController::class, 'loginPetugas']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [UserController::class, 'checkLogin']);
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    
    Route::get('/petugas', [petugasController::class, 'checkLogin']);
    Route::post('/logoutPetugas', [AuthenticationController::class, 'logoutPetugas']);
});

Route::get('/getPelaporan/{userId}', [LaporanController::class, 'getDataPelaporan']);
Route::get('/getDetailLap/{idLaporan}', [LaporanController::class, 'getDetailPelaporan']);
Route::get('/updateStatusRwt/{idLaporan}', [LaporanController::class, 'updateStatusRwt']);

Route::post('/addPelaporan', [LaporanController::class, 'AddPelaporan']);
Route::post('/addPelaporanPetugas', [LaporanController::class, 'AddPelaporanPetugas']);
Route::post('/addTanganiPetugas', [LaporanController::class, 'AddTanganiPetugas']);

Route::get('/beritaTerbaru', [ArtikelBeritaController::class, 'newArtikelBerita']);
Route::get('/userData', [UserController::class, 'index']);

Route::get('/getBerita/{value}', [ArtikelBeritaController::class, 'newArtikelBerita']);
Route::get('/verification/{noHp}', [AuthenticationController::class, 'verfikasiRegister']);
Route::post('/verification/akun', [AuthenticationController::class, 'postVerification']);
Route::post('/changepass/{noHp}', [AuthenticationController::class, 'changePassword']);
Route::get('/getNoHp/{text}', [AuthenticationController::class, 'getNoHp']);
Route::get('/getBerita', [ArtikelBeritaController::class, 'newArtikelBerita']);

Route::get('/getBeritaHigh', [ArtikelBeritaController::class, 'getArtikelHighlight']);

Route::get('/searchLapp', [ArtikelBeritaController::class, 'getArtikelHighlight']);

//Riwayat Pelaporan Api
Route::get('/searchLapp/{userId}/{text}', [LaporanController::class, 'searchLapKategori']);
Route::get('/filterLapMenunggu/{userId}', [LaporanController::class, 'filterLapMenunggu']);
Route::get('/filterLapProses/{userId}', [LaporanController::class, 'filterLapProses']);
Route::get('/filterLapSelesai/{userId}', [LaporanController::class, 'filterLapSelesai']);
Route::get('/filterLapDitolak/{userId}', [LaporanController::class, 'filterLapDitolak']);
Route::get('/filterLapEmergency/{userId}', [LaporanController::class, 'filterLapEmergency']);

//Artikel Api
Route::get('/getEdukasi', [ArtikelController::class, 'newArtikelEdukasi']);
Route::get('/getAgenda', [ArtikelController::class, 'newArtikelAgenda']);
Route::get('/getBerita', [ArtikelBeritaController::class, 'newArtikelBerita']);
Route::get('/getDetailBerita/{idBerita}', [ArtikelBeritaController::class, 'detailBerita']);
Route::get('/getDetailAgenda/{idAgenda}', [ArtikelController::class, 'detailAgenda']);
Route::get('/getDetailEdukasi/{idEdukasi}', [ArtikelController::class, 'detailEdukasi']);
Route::get('/getAllArtikel', [ArtikelController::class, 'getArtikelAll']);
Route::get('/getAllArtikelHigh', [ArtikelController::class, 'getAllArtikelHigh']);
Route::get('/semuaArtikel', [ArtikelBeritaController::class, 'semuaArtikel']);

Route::post('/user/password', [UserController::class, 'updatePassword']);
Route::get('/getHp/{text}', [AuthenticationController::class, 'getHp']);


Route::post('/user', [UserController::class, 'updateProfil']);
Route::post('/sendToWa', [LaporanController::class, 'sendInfoToWhatsapp']);

Route::post('/addImage', [LaporanController::class, 'addImage']);
Route::post('/addImagePetugas', [LaporanController::class, 'addImagePetugas']);

Route::post('/user/foto', [UserController::class, 'UpdateFile']);
Route::get('/user/akun', [UserController::class, 'getDataProfile']);
Route::post('/verifyOtp/whatsapp', [AuthenticationController::class, 'verifOtpWhatsapp']);
Route::get('/getBeritaHome', [ArtikelBeritaController::class, "getArtikelBeritaHome"]);
