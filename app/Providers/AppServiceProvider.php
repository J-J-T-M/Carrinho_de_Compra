<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate ;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $categoryMenu = Category::all();
        view()->share('categoryMenu' , $categoryMenu);

        Gate::define('see-product', function (User $user, Product $product){
            return $user->id === $product->id_user;
        });
    }
}
