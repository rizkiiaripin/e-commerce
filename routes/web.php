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

Route::prefix('dashboard')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');
        // Route::resource('/blogs', BlogController::class)->except('show')->name(['index' => 'blogs.index', 'create' => 'blogs.create', 'store' => 'blogs.store', 'edit' => 'blogs.edit', 'update' => 'blogs.update', 'destroy' => 'blogs.destroy']);
        Route::resource('/users', UserController::class)->except('show')->names(['index' => 'users.index', 'create' => 'users.create', 'store' => 'users.store', 'edit' => 'users.edit', 'update' => 'users.update', 'destroy' => 'users.destroy']);
        Route::resource('/roles', RoleController::class)->except('show')->names(['index' => 'roles.index', 'create' => 'roles.create', 'store' => 'roles.store', 'edit' => 'roles.edit', 'update' => 'roles.update', 'destroy' => 'roles.destroy']);
        Route::resource('/permissions', PermissionController::class)->except('show')->names(['index' => 'permissions.index', 'create' => 'permissions.create', 'store' => 'permissions.store', 'edit' => 'permissions.edit', 'update' => 'permissions.update', 'destroy' => 'permissions.destroy']);
        Route::resource('videos', VideoController::class)->except('show')->names(['index' => 'videos.index', 'create' => 'videos.create', 'store' => 'videos.store', 'edit' => 'videos.edit', 'update' => 'videos.update', 'destroy' => 'videos.destroy']);
        // Route::controller(MenuController::class)->group(function () {
        //     Route::get('/menu/create', 'create')->name('menu.create');
        //     Route::post('/menu/store', 'store')->name('menu.store');
        //     Route::get('/menu/edit/{menu}', 'edit')->name('menu.edit');
        //     Route::put('/menu/update/{menu}', 'update')->name('menu.update');
        //     Route::delete('/menu/destroy/{menu}', 'destroy')->name('menu.destroy');
        //     Route::get('/menu', 'index')->name('menu.index');
        //     Route::get('json/menu', 'data')->name('menu.data');
        //     //update order
        //     Route::post('/menu/update-order', 'updateOrder')->name('menu.update_order');
        // });
    });
});


require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
