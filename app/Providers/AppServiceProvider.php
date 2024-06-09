<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Traits\ModelHelperTrait;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    use ModelHelperTrait;

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
        $employees_count = $this->getModelClass("employees")::get()->count();
        $representatives_count = $this->getModelClass("representatives")::get()->count();
        $products_count = $this->getModelClass("products")::get()->count();
        $offers_total = $this->getModelClass("offers")::get()->sum("total");
        $offers_count = $this->getModelClass("offers")::get()->count();
        $clients_count = $this->getModelClass("clients")::get()->count();
        $suppliers_count = $this->getModelClass("suppliers")::get()->count();

        View::share('employees_count', $employees_count);
        View::share('representatives_count', $representatives_count);
        View::share('products_count', $products_count);
        View::share('offers_total', $offers_total);
        View::share('offers_count', $offers_count);
        View::share('clients_count', $clients_count);
        View::share('suppliers_count', $suppliers_count);

        Schema::defaultStringLength(191);
    }
}
