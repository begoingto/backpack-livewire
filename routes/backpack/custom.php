<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CustomController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () {
    // custom admin routes
    Route::crud('category', 'CategoryCrudController');

    Route::group(['prefix' => 'custom', 'as' => 'custom.'], function () {
        Route::get('category', [CustomController::class, 'category'])->name('category');
    });
    Route::get('/file', function () {
        return view('custom.file-manage');
    })->name('file');
    Route::group(['prefix' => 'files'], function () {
        Lfm::routes();
    });
    Route::crud('tag', 'TagCrudController');
    Route::crud('article', 'ArticleCrudController');
}); // this should be the absolute last line of this file
