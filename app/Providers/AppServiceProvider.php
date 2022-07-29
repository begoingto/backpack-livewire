<?php
namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\RoleOverrideController;
use App\Http\Controllers\Admin\UserOverrideController;
use App\Http\Controllers\Admin\PermissionOverrideController;
use Backpack\PermissionManager\app\Http\Controllers\RoleCrudController;
use Backpack\PermissionManager\app\Http\Controllers\UserCrudController;
use Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PermissionCrudController::class, PermissionOverrideController::class);
        $this->app->bind(UserCrudController::class, UserOverrideController::class);
        $this->app->bind(RoleCrudController::class, RoleOverrideController::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('lfm.use_package_routes')) {
            Route::group(['prefix' => 'filemanager'], function () {
                \UniSharp\LaravelFilemanager\Lfm::routes();
            });
        }
    }
}
