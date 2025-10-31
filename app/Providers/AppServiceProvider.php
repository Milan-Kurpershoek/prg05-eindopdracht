<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

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
        \Gate::define('edit-book', function (User $user, Book $book){
            return $book->user()->is($user);
        });
    }
}
