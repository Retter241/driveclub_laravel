<?php

namespace App\Providers;
 
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\User;
use App\Post;
use App\Project;
use App\Category;
use App\Comment;
use DB;
use View;

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
        $sidebar_projects = Project::OrderBy('view_count' , 'ASC')->take(4)->get();
        View::share('sidebar' , $sidebar_projects);
    
        $categories_list = Category::OrderBy('id' , 'ASC')->get();
         View::share('categories_list' , $categories_list);
    
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('d.m.Y'); ?>";
        });
    }
}
