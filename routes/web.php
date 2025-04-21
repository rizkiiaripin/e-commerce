<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/blogs', BlogController::class)->except('show')->name('index', 'blogs.index');
    Route::resource('/users', UserController::class)->except('show')->name('index', 'users');
    Route::resource('/roles', RoleController::class);;
    Route::resource('/permissions', PermissionController::class)->except('show')->name('index', 'permissions');
    Route::controller(MenuController::class)->group(function () {
        Route::get('/menu/create', 'create')->name('menu.create');
        Route::post('/menu/store', 'store')->name('menu.store');
        Route::get('/menu/edit/{menu}', 'edit')->name('menu.edit');
        Route::put('/menu/update/{menu}', 'update')->name('menu.update');
        Route::delete('/menu/destroy/{menu}', 'destroy')->name('menu.destroy');
        Route::get('/menu', 'index')->name('menu.index');
        Route::get('json/menu', 'data')->name('menu.data');
        //update order
        Route::post('/menu/update-order', 'updateOrder')->name('menu.update_order');
    });
    Route::resource('videos', VideoController::class)->except('show')->name('index', 'videos.index');
});


require __DIR__ . '/auth.php';
