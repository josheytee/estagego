<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\ServiceProvider;

class AdminLiteServiceProvider extends ServiceProvider
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
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
            $event->menu->add('Pages Content');
            $pages = Page::all();
            foreach ($pages as $page) {
                $event->menu->add([
                    'text' => $page->pageName,
                    'url' => 'admin/' . \Str::slug($page->pageName) . 's',
                ]);
            }
            $event->menu->add([
                'text' => 'Testimonials',
                'url' => 'admin/testimonials',
            ]);
            $event->menu->add([
                'text' => 'Newsletters',
                'url' => 'admin/newsletters',
            ]);
        });
    }
}
