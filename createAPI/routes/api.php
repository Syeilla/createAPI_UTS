<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MahasiswaController;

// Endpoint Login (POST)
Route::post('/login', [AuthController::class, 'login']);

// Endpoint Mahasiswa (GET) - hanya bisa diakses dengan token
Route::middleware('auth:sanctum')->get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/test', function () {
    return response()->json(['message' => 'API works!']);
});