<?php

use App\Http\Controllers\Backoffice\AuthController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\SuperadminController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Middleware\AuthAdminMiddleware;
use App\Http\Middleware\BackofficeMiddleware;
use App\Http\Middleware\ClientMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(ClientMiddleware::class)->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('landing-page');
});

Route::middleware(BackofficeMiddleware::class)->group(function () {
    Route::get('/admin/login', [AuthController::class, 'login']);
    Route::post('/admin/login', [AuthController::class, 'loginAction']);

    Route::middleware(AuthAdminMiddleware::class)->group(function () {
        Route::get('/admin', [DashboardController::class, 'index']);

        Route::prefix('accounts')->group(function () {
            Route::apiResource('superadmin', SuperadminController::class);
        });
        });
});
