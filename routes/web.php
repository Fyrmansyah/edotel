<?php

use App\Http\Controllers\Backoffice\AuthController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\PaymentMethodController;
use App\Http\Controllers\Backoffice\PhotoController;
use App\Http\Controllers\Backoffice\PricingController;
use App\Http\Controllers\Backoffice\SuperadminController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Middleware\AuthAdminMiddleware;
use App\Http\Middleware\BackofficeMiddleware;
use App\Http\Middleware\ClientMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(ClientMiddleware::class)->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('landing-page');
});

Route::middleware(BackofficeMiddleware::class)->prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginAction']);

    Route::middleware(AuthAdminMiddleware::class)->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        
        Route::get('/pricings', [PricingController::class, 'index']);
        Route::post('/pricings/{pricing}', [PricingController::class, 'update']);

        Route::get('/payment-methods/qris', [PaymentMethodController::class, 'getQris']);
        Route::post('/payment-methods/qris', [PaymentMethodController::class, 'updateQris']);

        Route::prefix('accounts')->group(function () {
            Route::apiResource('superadmin', SuperadminController::class);
        });

        Route::resource('photos', PhotoController::class)->only(['index', 'create', 'store']);
    });
});
