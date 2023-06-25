<?php

namespace App\Providers;
use App\Models\Page;
use App\Models\AppDownload;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
               View()->composer(['layout.inner','index','layout.main','layout.blog_inner','layout.help_inner'], function($view)
        {
            // $service=Page::with('Service_product')->get();
             $page=Page::all()->load(['Categories']);
           
            //      

        $view->with('pages',$page) 
        ;
        });

        // 
        View()->composer(['partials.downloadApp'], function($view)
        {
            // $service=Page::with('Service_product')->get();
             $App=AppDownload::all()->first();
           
            //      

        $view->with('appDownload',$App) 
        ;
        });
        //


        View()->composer(['layout.inner','layout.main'], function($view)
        {
           
             $contact=Contact::all()->first();
           $page=Page::all();
           $category=Category::all();
            //      

        $view->with('contact',$contact)
             ->with('pages',$page) 
             ->with('categories',$category) 
        ;
        }); 

        View()->composer(['partials.latestnews'], function($view)
        {
           
             $blog=Blog::take(3)->latest()->get();

            //      

        $view->with('blogs',$blog)
            
        ;
        }); 


        

    }
}
