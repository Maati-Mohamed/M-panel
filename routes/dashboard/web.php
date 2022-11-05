<?php

use App\Http\Controllers\Dashboard\AdminControlller;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\RoleController;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
	'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function(){

    Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {

        Route::get('/dashboard', [AdminControlller::class, 'index'])->name('dashboard');
        
        Route::resource('settings', SettingController::class)->only(['index','update']);
        Route::resource('profile', ProfileController::class)->only(['index','edit','update']);
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('password', [UserController::class, 'password'])->name('change_password');
        Route::put('password', [UserController::class, 'change_password'])->name('change_password');

    });
});