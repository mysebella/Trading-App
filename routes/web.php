<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\FundController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\InvestmentController;
use App\Http\Controllers\User\KncController;
use App\Http\Controllers\User\NetworkController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\SecurityController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\User\TestimonialController;
use App\Http\Controllers\User\TradeController;
use App\Http\Controllers\User\WalletController;
use App\Http\Middleware\CheckSession;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::prefix('signin')->controller(AuthController::class)->group(function () {
        Route::view('', 'auth.signin')->name('auth.signin');
        Route::post('', 'signin')->name('auth.signin.post');
    });

    Route::prefix('signup')->controller(AuthController::class)->group(function () {
        Route::view('', 'auth.signup')->name('auth.signup');
        Route::post('', 'signup')->name('auth.signup.post');
    });

    Route::get('logout', function (Request $request) {
        $request->session()->flush();
        return redirect()->route('auth.signin')->withCookie(Cookie::forget('id'));
    })->name('auth.logout');
});

Route::middleware(CheckSession::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('setting')->controller(SettingController::class)->group(function () {
        Route::get('profile', 'profile')->name('setting.profile');
        Route::put('profile/update', 'profileUpdate')->name('setting.profile.update');
        Route::put('profile/update/password', 'profileUpdatePassword')->name('setting.profile.update.password');

        Route::get('image', 'image')->name('setting.image');
        Route::put('image/update', 'imageUpdate')->name('setting.image.update');
    });

    Route::prefix('security')->controller(SecurityController::class)->group(function () {
        Route::get('', 'index')->name('security');
        Route::put('update', 'update')->name('security.update');
    });

    Route::prefix('knc')->controller(KncController::class)->group(function () {
        Route::get('', 'index')->name('knc');
        Route::put('update', 'update')->name('knc.update');
    });

    Route::prefix('investment')->controller(InvestmentController::class)->group(function () {
        Route::get('', 'index')->name('investment');

        Route::get('paid', 'paid')->name('investment.paid');
        Route::post('paid', 'paidPost')->name('investment.paid.post');

        Route::get('invoice/{code}', 'invoice')->name('investment.invoice');

        Route::get('confirmation/{id}', 'confirmation')->name('investment.confirmation');
        Route::put('confirmation/{id}', 'confirmationPut')->name('investment.confirmation.put');
    });

    Route::prefix('trade')->controller(TradeController::class)->group(function () {
        Route::get('', 'index')->name('trade');
        Route::post('', 'store')->name('trade.post');
        Route::get('history', 'history')->name('trade.history');
        Route::get('profits', 'profits')->name('trade.profits');
    });

    Route::prefix('fund')->controller(FundController::class)->group(function () {
        Route::get('bonus', 'bonus')->name('fund.bonus');
        Route::get('profits', 'profits')->name('fund.profits');
    });

    Route::prefix('wallet')->controller(WalletController::class)->group(function () {
        Route::get('balance', 'balance')->name('wallet.balance');

        Route::get('add-balance', 'addBalance')->name('wallet.add-balance');
        Route::post('add-balance/store', 'addBalanceStore')->name('wallet.add-balance.post');

        Route::get('invoice/{id}', 'invoice')->name('wallet.invoice');
        Route::get('confirmation/{id}', 'confirmation')->name('wallet.confirmation');
        Route::put('confirmation/{id}', 'confirmationPut')->name('wallet.confirmation.put');

        Route::get('transfer', 'transfer')->name('wallet.transfer');
        Route::get('withdraw', 'withdraw')->name('wallet.withdraw');
    });

    Route::prefix('network')->controller(NetworkController::class)->group(function () {
        Route::get('refferals', 'refferals')->name('network.refferals');
        Route::get('generation', 'generation')->name('network.generation');
    });

    Route::prefix('register')->controller(RegisterController::class)->group(function () {
        Route::get('', 'index')->name('register');
    });

    Route::view('faq', 'user.faq', ['page' => 'faq'])->name('faq');

    Route::view('news', 'user.news', ['page' => 'news'])->name('news');

    Route::prefix('testimonial')->controller(TestimonialController::class)->group(function () {
        Route::get('', 'index')->name('testimonial.testimonial');
        Route::get('add-testimonial', 'addTestimonial')->name('testimonial.add-testimonial');
    });

    Route::view('download', 'user.download', ['page' => 'download'])->name('download');
});

require __DIR__ . "/admin.php";
