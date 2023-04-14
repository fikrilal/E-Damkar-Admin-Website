<?php


use App\Http\Controllers\RestAPI\AuthenticationController;
use App\Http\Controllers\RestAPI\LaporanController;
use App\Http\Controllers\RestAPI\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user', [UserController::class, 'checkLogin']);
    Route::post('/addPelaporan', [LaporanController::class, 'AddPelaporan']);
});


