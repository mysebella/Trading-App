<?php
// dashboard admin

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BalanceController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PackageInvestmentController;
use App\Models\Bank;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('dashboard.home');
    Route::get('users', [HomeController::class, 'index'])->name('dashboard.users');

    Route::prefix('product')->group(function () {
        Route::get('add-investment', [PackageInvestmentController::class, 'index'])->name('dashboard.product.add-investment');
        Route::get('request-investment', [PackageInvestmentController::class, 'requestInvestment'])->name('dashboard.product.request-investment');
        Route::put('request-investment/acc/{id}', [PackageInvestmentController::class, 'accInvestment'])->name('dashboard.product.request-investment.put');

        Route::post('add-investment/store', [PackageInvestmentController::class, 'store'])->name('dashboard.product.add-investment.post');
    });

    Route::prefix('balance')->controller(BalanceController::class)->group(function () {
        Route::get('request-balance', 'requestBalance')->name('dashboard.balance.request-balance');
        Route::get('request-withdraw', 'requestWithdraw')->name('dashboard.balance.request-withdraw');
    });

    Route::prefix('admin')->controller(AdminController::class)->group(function () {
        Route::view('add-account-bank', "admin.admin.add-account-bank", ['page' => 'admin', 'banks' => Bank::get()])->name('dashboard.admin.add-account-bank');
        Route::post('add-account-bank', 'addAccountBank')->name('dashboard.admin.add-account-bank.post');
        Route::delete('add-account-bank/{id}', 'addAccountBankDelete')->name('dashboard.admin.add-account-bank.delete');
    });
});
