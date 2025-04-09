<?php
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/blogs',BlogController::class)->except('show')->name('index','blogs');
    Route::get('/roles',[RoleController::class,'index'])->name('roles');
});


require __DIR__.'/auth.php';