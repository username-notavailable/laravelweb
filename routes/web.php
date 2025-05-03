<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{IndexController, LoginController, AssetsController};
use Fuzzy\Fzpkg\Classes\Clients\KeyCloak\Classes\Middleware\{OnlyGuest, CheckBearerToken};

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::middleware(OnlyGuest::class)->group(function () {
    Route::get('/auth/login', [LoginController::class, 'login'])->name('auth_login');
    Route::post('/auth/try-login', [LoginController::class, 'tryLogin'])->name('auth_try_login');
});

Route::middleware('auth:keyCloak')->group(function () {
    Route::get('/auth/logout', [LoginController::class, 'logout'])->name('auth_logout');
    Route::get('/home/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');
});

Route::controller(AssetsController::class)->group(function () {
	Route::get('/assets/pub/item', 'getPubItem')->name('asset_public_item');
	Route::get('/assets/pvt/item', 'getPvtItem')->middleware(CheckBearerToken::class)->name('asset_private_item');
    Route::get('/assets/pub/image', 'getPubImage')->name('asset_public_image');
});
