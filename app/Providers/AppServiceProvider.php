<?php

namespace App\Providers;

use App\Models\BuyerList;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrapFive();
        Blade::if('admin', function () {
            return Auth::user()->role == 1;
        });
        Blade::if('admin_choice',function($book){
            return $book->admin_choice == 1;
        });
        Blade::if('trash',function () {
            return request()->trash;
        });
        View::composer([
            'auth.book.create',
            'auth.book.index',
            'auth.book.edit',
            'auth.book.index',
            'welcome'
        ],function ($view){
            $view->with('categories',Category::all());
        });
        Blade::if('bought', function ($book_id) {
            $user_id = Auth::id();
            $check = BuyerList::where('book_id',"$book_id")->where('user_id',"$user_id")->count();
            return $check != NULL;
        });
    }
}
