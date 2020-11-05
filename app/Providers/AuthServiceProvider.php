<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        // danh muc sp
        Gate::define('list-category', 'App\Policies\CategoryPolicy@viewAny');
        Gate::define('add-category', 'App\Policies\CategoryPolicy@create');
        Gate::define('edit-category', 'App\Policies\CategoryPolicy@update');
        Gate::define('delete-category', 'App\Policies\CategoryPolicy@delete');

        //sp
        Gate::define('list-product', 'App\Policies\ProductPolicy@viewAny');
        Gate::define('add-product', 'App\Policies\ProductPolicy@create');
        Gate::define('edit-product', 'App\Policies\ProductPolicy@update');
        Gate::define('delete-product', 'App\Policies\ProductPolicy@delete');

        //intro
        Gate::define('list-intro', 'App\Policies\IntroPolicy@viewAny');
        Gate::define('add-intro', 'App\Policies\IntroPolicy@create');
        Gate::define('edit-intro', 'App\Policies\IntroPolicy@update');
        Gate::define('delete-intro', 'App\Policies\IntroPolicy@delete');

        //info
        Gate::define('list-info', 'App\Policies\InfoPolicy@viewAny');
        Gate::define('add-info', 'App\Policies\InfoPolicy@create');
        Gate::define('edit-info', 'App\Policies\InfoPolicy@update');
        Gate::define('delete-info', 'App\Policies\InfoPolicy@delete');

        //contact
        Gate::define('list-contact', 'App\Policies\ContactPolicy@viewAny');
        Gate::define('add-contact', 'App\Policies\ContactPolicy@create');
        Gate::define('edit-contact', 'App\Policies\ContactPolicy@update');
        Gate::define('delete-contact', 'App\Policies\ContactPolicy@delete');

        //user
        Gate::define('list-user', 'App\Policies\UserPolicy@viewAny');
        Gate::define('add-user', 'App\Policies\UserPolicy@create');
        Gate::define('edit-user', 'App\Policies\UserPolicy@update');
        Gate::define('delete-user', 'App\Policies\UserPolicy@delete');

        //setting
        Gate::define('list-setting', 'App\Policies\SettingPolicy@viewAny');
        Gate::define('add-setting', 'App\Policies\SettingPolicy@create');
        Gate::define('edit-setting', 'App\Policies\SettingPolicy@update');
        Gate::define('delete-setting', 'App\Policies\SettingPolicy@delete');

        //role
        Gate::define('list-role', 'App\Policies\RolePolicy@viewAny');
        Gate::define('add-role', 'App\Policies\RolePolicy@create');
        Gate::define('edit-role', 'App\Policies\RolePolicy@update');
        Gate::define('delete-role', 'App\Policies\RolePolicy@delete');
    }
}
