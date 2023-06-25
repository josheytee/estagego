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
        //  enabled because of pagination
        Paginator::useBootstrap();

               View()->composer(['layout.inner','index','layout.main','layout.blog_inner','layout.help_inner'], function($view)
        {
            // $service=Page::with('Service_product')->get();
            //  $page=Page::all()->load(['Categories','ServicePage']);

            $pageWithAbout=Page::all();

            $page=Page::with('Categories','ServicePage')->where('pageName','!=','About')->get();
           
             $contact=Contact::all()->first();
          
            $category=Category::all();

            $appdownload=AppDownload::all()->first();
            //      

       

        $view->with('pages',$page) 
        ->with('contact',$contact)
        ->with('categories',$category)
        ->with('appdownload',$appdownload)
        ->with('pageWithAbout',$pageWithAbout)
        ;
        });

        // 
        View()->composer(['partials.downloadApp'], function($view)
        {
            // $service=Page::with('Service_product')->get();
             $App=AppDownload::all()->first();
           
            //      

        $view->with('appdownload',$App) 
        ;
        });
        //


    

        View()->composer(['partials.latestnews'], function($view)
        {
           
             $blog=Blog::take(3)->latest()->get();

            //      

        $view->with('blogs',$blog)
            
        ;
        }); 


        

    }
}
