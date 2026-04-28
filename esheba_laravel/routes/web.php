<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ClientInfoController;
use App\Http\Controllers\Admin\SendMessageController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/packages', [FrontendController::class, 'packages'])->name('packages');
Route::get('/domain-hosting', [FrontendController::class, 'domainHosting'])->name('domain.hosting');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/team', [FrontendController::class, 'team'])->name('team');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/terms-conditions', [FrontendController::class, 'termsConditions'])->name('terms');
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('services', ServiceController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('client-info', ClientInfoController::class);
    Route::post('client-info/{id}/block', [ClientInfoController::class, 'block'])->name('client-info.block');

    // Email/SMS routes
    Route::post('client-info/{id}/send-email', [ClientInfoController::class, 'sendEmail'])->name('client-info.send-email');
    Route::post('client-info/send-email-all', [ClientInfoController::class, 'sendEmailAll'])->name('client-info.send-email-all');
    Route::post('client-info/{id}/send-sms', [ClientInfoController::class, 'sendSms'])->name('client-info.send-sms');
    Route::post('client-info/send-sms-all', [ClientInfoController::class, 'sendSmsAll'])->name('client-info.send-sms-all');
    
    // Send Message Menu Routes
    Route::get('send-message', [SendMessageController::class, 'index'])->name('send-message.index');
    Route::post('send-message/email', [SendMessageController::class, 'sendEmail'])->name('send-message.send-email');
    Route::post('send-message/sms', [SendMessageController::class, 'sendSms'])->name('send-message.send-sms');
});

Route::prefix('admin')->group(function () {
    require __DIR__.'/auth.php';
});