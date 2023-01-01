<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Modules\Blog\Contracts\CategoryInterface', 'App\Modules\Blog\Repositories\CategoryRepositories');
        $this->app->bind('App\Contracts\UserRepositoryInterface', 'App\Repositories\UsersRepository');
        $this->app->bind('App\Modules\Blog\Contracts\CategoryAgeGroupInterface', 'App\Modules\Blog\Repositories\CategoryAgeGroupRepository');
        $this->app->bind('App\Modules\Blog\Contracts\BlogsInterface', 'App\Modules\Blog\Repositories\BlogsRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
