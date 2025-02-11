<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuluakController;
use App\Http\Controllers\ModuluakUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/moduluak', [ModuluakController::class, 'store']);
Route::get('/moduluak', [ModuluakController::class, 'index']);
Route::get('/moduluak/{id}', [ModuluakController::class, 'show']);
Route::post('/moduluak', [ModuluakController::class, 'store']);
Route::put('/moduluak/{id}', [ModuluakController::class, 'update']);
Route::delete('/moduluak/{id}', [ModuluakController::class, 'destroy']);

Route::get('/ikasleak', [AuthController::class, 'ikasleak'])->middleware('auth:sanctum');
Route::post('/ikaslemoduluak', [ModuluakUserController::class, 'ikaslemoduluak'])->middleware('auth:sanctum');
