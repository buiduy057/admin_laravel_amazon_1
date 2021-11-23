<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\User;
use App\Ebay;
use App\Product;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    // protected $policies = [
    //     'App\Model' => 'App\Policies\ModelPolicy',
    //   ];
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
        URL::forceScheme('https');

        view()->composer(['admin.layouts.Sidebar'],function($view){
            $user = User::find(1);
            $view->with('user',$user);
        });
        view()->composer(['admin.layouts.Menu'],function($view){
            $user = User::find(1);
            $view->with('user',$user);
        });
        view()->composer(['admin.Page.Ebay'],function($view){
            $user = User::find(1);
            $view->with('user',$user);
        });
        view()->composer(['admin.Page.Ebay'],function($view){
            $ebay = Ebay::get();
            $view->with('ebay',$ebay);
        });
        view()->composer(['admin.Page.ProductList'],function($view){
            $ebay = Ebay::get();
            $view->with('ebay',$ebay);
        });
        view()->composer(['admin.Page.Modal.ModalRemove'],function($view){
            $ebay = Ebay::get();
            $view->with('ebay',$ebay);
        });
        
    }
}
