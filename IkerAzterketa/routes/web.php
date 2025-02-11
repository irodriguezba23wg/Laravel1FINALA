<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuluakController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/moduluak', ModuluakController::class);
