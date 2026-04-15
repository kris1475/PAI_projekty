<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalcController;

Route::get('/', [CalcController::class, 'index']);
Route::post('/', [CalcController::class, 'calculate']);

Route::get('/login', [CalcController::class, 'login']);
Route::post('/login', [CalcController::class, 'loginPost']);

Route::get('/logout', [CalcController::class, 'logout']);