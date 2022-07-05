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

        Gate::define('administrasi','App\Policies\AdminPolicy@administrasi');
        Gate::define('create','App\Policies\ProductPolicy@create');
        Gate::define('edit','App\Policies\ProductPolicy@edit');
        Gate::define('delete','App\Policies\ProductPolicy@delete');
    }
}
