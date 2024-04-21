<?php

use App\Http\Controllers\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('auth')->group(function() {
    Route::post('register', [ApiAuthController::class, 'register']);
    Route::post('login', [ApiAuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function() {
        Route::post('logout', [ApiAuthController::class, 'logout']);

        Route::get('authenticated-user-details', [ApiAuthController::class, 'authenticatedUserDetails']);
    });
});