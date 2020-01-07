<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Cart;
use Auth;

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
        //
        view()->composer('layouts.sidebar_user',function($view){
            $category = Category::all();
            $countCart = "";
            if(Auth::check())
            {
                $countCart = Cart::where('user_id',Auth::user()->id)->count('user_id');
            }
            $view->with(['category'=>$category,'countCart'=>$countCart]);
        });
        view()->composer('user.result_product',function($view){
            $category = Category::all();
            $view->with('category',$category);
        });
        view()->composer('welcome',function($view){
            $category = Category::all();
            $category_pro = Category::with('product')->take(3)->get();
            $view->with(['category'=>$category,'category_pro'=>$category_pro]);
        });
        view()->composer('user.product_category',function($view){
            $categories = Category::all();
            $view->with('categories',$categories);
        });
    }
}
