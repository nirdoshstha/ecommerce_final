<?php

namespace App\Providers;

use App\Models\Category;
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
        $categories = Category::with(['subCategories'=>function($sub_category){
            $sub_category->has('products')
            ->withCount('products')
            ->orderBy('products_count','desc');
         }])
         ->has('subCategories')
         ->active()
         ->latest()
         ->get();
         view()->share('categories',$categories);
    }
}
