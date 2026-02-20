<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;

Route::middleware('auth.basic')->group(function () {
    Route::get('/customers', [CustomerController::class, 'index']);
});