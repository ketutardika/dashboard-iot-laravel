<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Projects;
use App\Models\ProjectsSections;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
        return realpath(base_path().'/../public_html/os');
      });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        View::composer('layouts.nav-sidebar', function($view)
        {
            $user_id = Auth::user()->id;
            $user_group_id = Auth::user()->user_group_id;
            $navbars = ProjectsSections::join('projects', 'projects_sections.unique_id_project', '=', 'projects.unique_id')->join('users', 'projects_sections.user_id', '=', 'users.id')->
            where('projects_sections.user_id',$user_id)->orwhere('users.user_group_id',$user_group_id)->where('projects.isactive','1')->select('*','projects_sections.unique_id as section_unique_id')->get();
            $view->with('navbars', $navbars);
        });
        Paginator::useBootstrap();
    }

}
