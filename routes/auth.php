<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
});
Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
