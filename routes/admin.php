<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ExpertController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SubPageController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/admin-auth.php';


Route::group(['middleware' => ['auth:admin']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', function () {
            $comments =  Comment::where('show', 0)->count();
            return view('admin.dashboard', compact('comments'));
        })->middleware('verified')->name('dashboard');

        Route::resource('blogs', BlogController::class)->names('blogs');
        Route::resource('clients', ClientController::class)->names('clients');
        Route::resource('newsletters', NewsletterController::class)->names('newsletters');
        Route::resource('homes', HomeController::class)->names('homes');
        Route::resource('features', FeatureController::class)->names('features');
        Route::resource('contacts', ContactController::class)->names('contacts');
        Route::resource('abouts', AboutController::class)->names('abouts');
        Route::resource('testimonials', TestimonialController::class)->names('testimonials');
        Route::resource('faqs', FaqController::class)->names('faqs');
        Route::resource('experts', ExpertController::class)->names('experts');
        Route::resource('authors', AuthorController::class)->names('authors');
        Route::resource('pages/subs', SubPageController::class)->names('subs');

        Route::put('/pages/{slug}/edit/{id}', [CMSController::class, 'home'])->name('pages.edit.home');
        Route::resource('pages', PageController::class, ['except' => [
            // 'show'
        ]]);
        Route::resource('services', ServiceController::class);
        // Route::get('/contacts/{contact}/acknowledged', [ContactController::class, 'acknowledge'])->name('contact.acknowledge');
        Route::resource('comments', CommentController::class);
        Route::get('/commment/{comment}/approve', [CommentController::class, 'approve'])->name('comment.approve');
        // Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
        // Route::patch('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
        // Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
    });
});
