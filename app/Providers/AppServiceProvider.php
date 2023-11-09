<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Menu;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer("theme.team.aside", function ($view) {

            $user = auth()->user();
            $menus = Menu::getMenu(true);
          
          
            $view->with('menusComposer',$menus,compact('user'));
        });
        
        View::share('theme','team');
    }
}
