<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use App\Models\Cart; //mua giỏ hàng
use Session;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\CategoryComposer;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    public function boot()
    {
        $user = exec('whoami');
        $user = str_slug($user);
        \Log::getMonolog()->popHandler();
        \Log::useDailyFiles(storage_path('/logs/laravel-').$user.'.log');

        //chia sẻ dulieu = gán biến $view trên header
        /*View::composer(
            [
                'frontend.layouts..header'
            ], CategoryComposer::class
        );*/

        view()->composer('*',"App\Http\ViewComposers\CategoryComposer");

        //chia sẻ dulieu = gán biến $view trên header
        /*view()->composer('frontend.layouts.header',function($view){
            $loai_sp = ProductType::all();
            $view->with('loai_sp',$loai_sp);
        });*/


        // Admin chia se login auth
        View::composer([
            'admin.layouts.partials.menu',
            'admin.dashboard.index',
        ], function ($view) {
            $arr = \Auth::user()->getPermissions()->pluck('slug')->toArray();
            $view->with('composer_auth_permissions', $arr);
        });


        //chia se locale da ngon ngu 
        View::composer('*', function ($view){
            $view->with('composer_locale', \App::getLocale());
        });


        /*dat hàng thêm vào giỏ su dung chua dc
        view()->composer('page.dathang',function($view){
            if(Session::has('cart')){
                $oldCart = Session::get('cart'); //Ktra trong giỏ củ có chưa
                $cart = new Cart($oldCart);//thêm mới vào giỏ cũ
                //đặt product_cart là tên sp đã chọn vào giỏ hàng, gán thêm với items
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
            
        }); 
        */
        Schema::defaultStringLength(191); 
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
