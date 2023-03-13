<?php

use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\backend\PdfController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SettingsController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;


/**
 * Frontend Routes
 */

// Route::get('/', [FrontendController::class, 'home'])->name('home');
// Route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');
// Route::get('changeLanguage/{lang}', [FrontendController::class, 'change_language'])->name('change_language');

 /**
  * Backend Routes
  */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');
});

Route::group(['middleware' => 'auth'], function() {
  Route::get('settings', [SettingsController::class, 'get_setting'])->name('settings_page');
  Route::get('product', [SettingsController::class, 'product_settings'])->name('product_settings');
  Route::post('settings_store', [SettingsController::class, 'store'])->name('settings_store');
  Route::post('env_store', [SettingsController::class, 'store'])->name('envSettingStore');

  Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

  //pdf routes
  Route::get('/create', [PdfController::class, 'create'])->name('pdf.create');
});

