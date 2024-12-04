<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DesignController;
use App\Http\Controllers\Backend\EmailInboxController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShowDesignController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\WebsiteColorController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        //profile routes
        Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');
        Route::post('profile/update', [AdminProfileController::class, 'profileUpdate'])->name('profile.update');
        Route::post('profile/update/password', [AdminProfileController::class, 'passwordUpdate'])->name('password.update');

        //settigs
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('logo-setting-update', [SettingController::class, 'logoSettingUpdate'])->name('logo-setting-update.update');
        Route::put('general-settnig-update', [SettingController::class, 'generalSettingUpdate'])->name('general-setting-update.index');

        //category
        Route::put('category/change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
        Route::resource('category', CategoryController::class);

        //services
        Route::put('services/change-status', [ServicesController::class, 'changeStatus'])->name('service.change-status');
        Route::resource('services', ServicesController::class);

        //sub category
        Route::put('sub-category/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
        Route::resource('sub-category', SubCategoryController::class);

        // update About page
        Route::put('about/update', [AboutController::class, 'update'])->name('about.update');

        // website color
        Route::put('website-color', [WebsiteColorController::class, 'update'])->name('website-color.update');

        // update home page
        Route::put('banner-at-home/change-status', [HomePageSettingController::class, 'changeStatus'])->name('banner-at-home.change-status');
        Route::put('home-page-setting', [HomePageSettingController::class, 'update'])->name('home-page-setting.update');
        Route::put('media-on-home-page', [HomePageSettingController::class, 'mediaOnHomePageUpdate'])->name('media-on-home-page.update');

        //desgin
        Route::post('design/upload-images/{desing}', [DesignController::class, 'uploadImage'])->name('design.upload.image');
        Route::get('design/get-images', [DesignController::class, 'getImage'])->name('design.get-images');
        Route::delete('design/delete-design-image', [DesignController::class, 'deleteImage'])->name('design.delete-image');
        Route::put('design/change-status', [DesignController::class, 'changeStatus'])->name('design.change-status');
        Route::resource('design', DesignController::class);

        //show desgins page
        Route::get('show-designs', [ShowDesignController::class, 'index'])->name('show-designs.index');

        //sub category routes
        Route::get('get-sub-categories', [SubCategoryController::class, 'getSubCategories'])->name('get-sub-categories');

        //email inbox
        Route::get('email-inbox', [EmailInboxController::class, 'index'])->name('get-emails.index');
        Route::get('email-inbox/show/{id}', [EmailInboxController::class, 'show'])->name('get-emails.show');
        Route::delete('email-inbox/{id}', [EmailInboxController::class, 'destroy'])->name('get-emails.destroy');

        //footer social buttons
        Route::put('socials/change-status', [SocialController::class, 'changeStatus'])->name('socials.change-status');
        Route::resource('socials', SocialController::class);
    }
);
