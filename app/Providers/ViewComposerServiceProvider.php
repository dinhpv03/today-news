<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Carbon::setLocale('vi');

        View::composer('*', function ($view) {
            $categories = Category::query()->limit(9)->get();
            $currentDate = Carbon::now()->translatedFormat('l, j F, Y');
            $topPosts = Post::query()
                ->with('category')
                ->orderBy('views', 'desc')
                ->take(7)
                ->get();

            $view->with([
                'dataMenu' => $categories,
                'currentDate' => $currentDate,
                'topPosts' => $topPosts
            ]);
        });

    }
}
