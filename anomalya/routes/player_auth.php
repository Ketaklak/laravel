<?php

use App\Http\Controllers\PlayerAuth\AuthenticatedSessionController;
use App\Http\Controllers\PlayerAuth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:player')->group(function () {
    Route::get('player/login', [AuthenticatedSessionController::class, 'create'])
        ->name('player.login');
    Route::post('player/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('player/register', [RegisteredUserController::class, 'create'])
        ->name('player.register');
    Route::post('player/register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth:player')->group(function () {
    Route::post('player/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('player.logout');
});
