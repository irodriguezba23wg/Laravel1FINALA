<?php

// Laravel-en eskaerak eta ibilbideak kudeatzeko beharrezko klaseak inportatzen dira.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuluakController;
use App\Http\Controllers\ModuluakUserController;

// Erabiltzaile autentifikatuaren informazioa lortzeko ibilbidea.
// 'auth:sanctum' middleware-a du, eta horrek esan nahi du autentifikazioa behar dela (Sanctum token bidez).
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Erabiltzaileen autentifikazioarekin lotutako ibilbideak.
Route::post('/register', [AuthController::class, 'register']); // Erabiltzailea erregistratzeko.
Route::post('/login', [AuthController::class, 'login']); // Saioa hasteko.
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum'); // Saioa ixteko (Sanctum bidez autentifikatuta egon behar da).

// 'ModuluakController' kontrolatzailearekin lotutako ibilbideak.
Route::post('/moduluak', [ModuluakController::class, 'store']); // Modulu berria sortzeko.
Route::get('/moduluak', [ModuluakController::class, 'index']); // Modulu guztien zerrenda lortzeko.
Route::get('/moduluak/{id}', [ModuluakController::class, 'show']); // Modulu zehatz baten datuak eskuratzeko.
Route::put('/moduluak/{id}', [ModuluakController::class, 'update']); // Modulu baten datuak eguneratzeko.
Route::delete('/moduluak/{id}', [ModuluakController::class, 'destroy']); // Modulu bat ezabatzeko.

// 'auth:sanctum' middleware-a erabiltzen duten ibilbideak, autentifikazioa behar dutenak.
Route::get('/ikasleak', [AuthController::class, 'ikasleak'])->middleware('auth:sanctum'); // Ikasleen informazioa eskuratzeko.
Route::post('/ikaslemoduluak', [ModuluakUserController::class, 'ikaslemoduluak'])->middleware('auth:sanctum'); // Ikasleen eta moduluen arteko loturak sortzeko.
