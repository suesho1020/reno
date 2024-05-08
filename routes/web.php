<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\AdminGuestController;
use App\Http\Controllers\Admin\AdminStockController;
use App\Http\Controllers\GUest\GuestLoginController;
use App\Http\Controllers\GUest\GuestStockController;
use App\Http\Controllers\GUest\GuestCartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // 登録
    Route::get('register', [AdminRegisterController::class, 'create'])
    ->name('register');
    Route::post('register', [AdminRegisterController::class, 'store']);

    // ログイン
    Route::get('login', [AdminLoginController::class, 'showLoginPage'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login']);

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:admin'])->group(function () {
        // ログアウト
        Route::post('logout', [AdminLoginController::class, 'destroy'])->name('logout');

        // ダッシュボード
        Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        // 発注者
        Route::resource('guest', AdminGuestController::class);

        // 在庫
        Route::resource('stock', AdminStockController::class);
    });
});

Route::group(['prefix' => 'guest', 'as' => 'guest.'], function () {
    // ログイン
    Route::get('login', [GuestLoginController::class, 'showLoginPage'])->name('login');
    Route::post('login', [GuestLoginController::class, 'login']);

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:guest'])->group(function () {
         // ログアウト
        Route::post('logout', [GuestLoginController::class, 'destroy'])->name('logout');

        // ダッシュボード
        Route::get('dashboard', fn() => view('guest.dashboard'))->name('dashboard');

        // 商品一覧
        Route::resource('stock', GuestStockController::class);

        // カート
        Route::get('cart', [GuestCartController::class, 'showCart'])->name('cart');
        Route::post('cart/add', [GuestCartController::class, 'addCart'])->name('addcart');        
    });
});

require __DIR__.'/auth.php';
