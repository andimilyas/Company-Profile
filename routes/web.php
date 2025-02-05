<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CompanyAboutController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProfileController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyStatisticController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OurPrincipleController;
use App\Http\Controllers\TestimonialController; 
use App\Http\Controllers\ProjectClientController; 

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

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('can:manage-statistics')->group(function () {
            Route::get('/statistics', [CompanyStatisticController::class]);
        });  
        Route::middleware('can:manage-products')->group(function () {
            Route::get('/products', [ProductController::class]);
        });  
        Route::middleware('can:manage-principles')->group(function () {
            Route::get('/principles', [OurPrincipleController::class]);
        });  
        Route::middleware('can:manage-testimonials')->group(function () {
            Route::get('/testimonials', [TestimonialController::class]);
        });  
        Route::middleware('can:manage-clients')->group(function () {
            Route::get('/clients', [ProjectClientController::class]);
        });  
        Route::middleware('can:manage-teams')->group(function () {
            Route::get('/teams', [OurTeamController::class]);
        });  
        Route::middleware('can:manage-about')->group(function () {
            Route::get('/about', [CompanyAboutController::class]);
        });  
        Route::middleware('can:manage-appointments')->group(function () {
            Route::get('/appointments', [AppointmentController::class]);
        });  
        Route::middleware('can:manage hero-sections')->group(function () {
            Route::get('/hero-sections', [HeroSectionController::class]);
        });  
    });
});

require __DIR__ . '/auth.php';
