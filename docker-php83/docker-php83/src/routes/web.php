<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

// Customer login/logout/check (sessions)
Route::post('/customer-login', [CustomerController::class, 'login']);
Route::get('/customer-logout', [CustomerController::class, 'logout']);
Route::get('/customer-check', [CustomerController::class, 'check']);
