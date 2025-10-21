<?php

use App\Http\Controllers\Backoffice\AuthController;
use App\Http\Controllers\Backoffice\BookingController as BackofficeBookingController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\PaymentMethodController;
use App\Http\Controllers\Backoffice\PhotoController;
use App\Http\Controllers\Backoffice\PricingController;
use App\Http\Controllers\Backoffice\AccountController;
use App\Http\Controllers\Backoffice\KamarController;
use App\Http\Controllers\Backoffice\ReviewController as BackofficeReviewController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Middleware\AuthAdminMiddleware;
use App\Http\Middleware\BackofficeMiddleware;
use App\Http\Middleware\ClientMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(ClientMiddleware::class)->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('landing-page');
    Route::post('/review', [ReviewController::class, 'postReview']);
    Route::get('/booking', [BookingController::class, 'formView']);
    Route::get('/booking/find', [BookingController::class, 'findBooking']);
    Route::post('/booking/find', [BookingController::class, 'findBookingAction']);
    Route::post('/booking', [BookingController::class, 'createBooking']);
    Route::get('/booking/{booking}', [BookingController::class, 'bookingDetail']);
});

Route::middleware(BackofficeMiddleware::class)->prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginAction']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::middleware(AuthAdminMiddleware::class)->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/reviews', [BackofficeReviewController::class, 'index']);
        Route::delete('/reviews/{review}', [BackofficeReviewController::class, 'delete']);

        Route::get('/pricings', [PricingController::class, 'index']);
        Route::post('/pricings/{pricing}', [PricingController::class, 'update']);

        Route::get('/payment-methods/qris', [PaymentMethodController::class, 'getQris']);
        Route::post('/payment-methods/qris', [PaymentMethodController::class, 'updateQris']);

        Route::apiResource('accounts', AccountController::class);

        Route::get('/bookings', [BackofficeBookingController::class, 'index']);
        Route::get('/bookings/available-rooms/{booking}', [BackofficeBookingController::class, 'availableRooms']);
        Route::post('/bookings/update/{booking}', [BackofficeBookingController::class, 'update']);


        Route::resource('photos', PhotoController::class)->only(['index', 'create', 'store']);

        Route::get('/settings', [SettingController::class, 'index']);
        Route::post('/settings', [SettingController::class, 'updateAudio']);

        Route::get('/kamar', [KamarController::class, 'index']);
        Route::post('/kamar', [KamarController::class, 'create']);
        Route::delete('/kamar/{kamar}', [KamarController::class, 'delete']);
    });
});
