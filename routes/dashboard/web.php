<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AdminProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ConfigController;
use App\Http\Controllers\Dashboard\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Web Routes
|-------------------------------------------------------------------------
|
*/
Route::group([
        'prefix' => 'dashboard',
        'as'     => 'dashboard.',
        'middleware' => ['auth:admin']
    ],function(){
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('profile', AdminProfileController::class)->only(['index','edit','update']);
        Route::resource('users', UserController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('configs', ConfigController::class)->only(['index', 'edit','update']);
        Route::put('password', [ConfigController::class, 'change_password'])->name('change');
        Route::resource('roles', RoleController::class);
    });

require __DIR__.'/auth.php';




   