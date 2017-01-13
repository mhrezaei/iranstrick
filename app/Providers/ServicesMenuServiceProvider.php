<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Traits\GlobalControllerTrait;
use Illuminate\Support\ServiceProvider;

class ServicesMenuServiceProvider extends ServiceProvider
{
    use GlobalControllerTrait;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

    public static function get()
    {
        if (self::domain() == 'fa')
        {
            $menu = Category::where('branch_id', 2)->where('parent_id', 0)->orderBy('title', 'asc')->get();
        }
        else
        {
            $menu = Category::where('branch_id', 14)->where('parent_id', 0)->orderBy('title', 'asc')->get();
        }
        return $menu;
    }

    public static function services()
    {
        return $menu = Post::selector(self::domain() . '-services')->orderBy('title', 'asc')->get();
    }
}
