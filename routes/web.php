<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DesignDetailsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\SetLocaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('about', 'about')->name('about');
});

Route::controller(ServicesController::class)->group(function () {
    Route::get('services', 'index')->name('services');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('contact', 'index')->name('contact.index');
    Route::post('contact', 'store')->name('contact.store');
});

Route::controller(DesignDetailsController::class)->group(function () {
    Route::get('design-details/{id}', 'index')->name('design-details.index');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('category/{id}', 'show')->name('category.show');
});

Route::get('set-locale/{locale}', SetLocaleController::class)->name('set-locale');

require __DIR__.'/admin.php';
require __DIR__.'/adminAuth.php';
