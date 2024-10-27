<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SubPageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\AdminProfileController;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/admin-auth.php';


Route::group(['middleware' => ['auth:admin']], function () {
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', function () {
            $comments =  Comment::where('show', 0)->count();
            // $contacts =  Contact::where('acknowledged', 0)->count();
            return view('admin.dashboard', compact('comments'));
        })->middleware('verified')->name('admin.dashboard');

        Route::resource('pages/subs', SubPageController::class)->names('subs');
        Route::resource('pages', PageController::class);
        Route::resource('services', ServiceController::class);
        Route::get('/contacts/{contact}/acknowledged', [ContactController::class, 'acknowledge'])->name('contact.acknowledge');
        Route::resource('comments', CommentController::class);
        Route::get('/commment/{comment}/approve', [CommentController::class, 'approve'])->name('comment.approve');
        // Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
        // Route::patch('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
        // Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
    });
});
