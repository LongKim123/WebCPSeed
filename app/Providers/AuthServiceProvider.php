<?php   

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('category-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-category'));
        // return $user->isAdmin;
    });
        Gate::define('category-add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.add-category'));
        // return $user->isAdmin;
    });
        Gate::define('category-delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.delete-category'));
        // return $user->isAdmin;
    });
        Gate::define('category-edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.edit-category'));
        // return $user->isAdmin;
    });


        //Menu
         Gate::define('menu-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        // return $user->isAdmin;
    });
        Gate::define('menu-add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.add-menu'));
        // return $user->isAdmin;
    });
        Gate::define('menu-delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.delete-menu'));
        // return $user->isAdmin;
    });
        Gate::define('menu-edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.edit-menu'));
        // return $user->isAdmin;
    });
        //Product

         Gate::define('product-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-product'));
        // return $user->isAdmin;
    });
        Gate::define('product-add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.add-product'));
        // return $user->isAdmin;
    });
        Gate::define('product-delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.delete-product'));
        // return $user->isAdmin;
    });
        Gate::define('product-edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.edit-product'));
        // return $user->isAdmin;
    });
        //Slider
         Gate::define('slider-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-slider'));
        // return $user->isAdmin;
    });
        Gate::define('slider-add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.add-slider'));
        // return $user->isAdmin;
    });
        Gate::define('slider-delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.delete-slider'));
        // return $user->isAdmin;
    });
        Gate::define('slider-edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.edit-slider'));
        // return $user->isAdmin;
    });
        //Setting
          Gate::define('setting-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-setting'));
        // return $user->isAdmin;
    });
        Gate::define('setting-add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.add-setting'));
        // return $user->isAdmin;
    });
        Gate::define('setting-delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.delete-setting'));
        // return $user->isAdmin;
    });
        Gate::define('setting-edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.edit-setting'));
        // return $user->isAdmin;
    });
        //User
            Gate::define('user-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-user'));
        // return $user->isAdmin;
    });
        Gate::define('user-add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.add-user'));
        // return $user->isAdmin;
    });
        Gate::define('user-delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.delete-user'));
        // return $user->isAdmin;
    });
        Gate::define('user-edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.edit-user'));
        // return $user->isAdmin;
    });
        //Role

        Gate::define('role-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-role'));
        // return $user->isAdmin;
    });
        Gate::define('role-add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.add-role'));
        // return $user->isAdmin;
    });
        Gate::define('role-delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.delete-role'));
        // return $user->isAdmin;
    });
        Gate::define('role-edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.edit-role'));
        // return $user->isAdmin;
    });

    }
}
