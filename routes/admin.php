<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SubPageController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/admin-auth.php';


Route::group(['middleware' => ['auth:admin']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', function () {
            $comments =  Comment::where('show', 0)->count();
            // $contacts =  Contact::where('acknowledged', 0)->count();
            return view('admin.dashboard', compact('comments'));
        })->middleware('verified')->name('dashboard');

        Route::resource('blogs', BlogController::class);
        Route::resource('authors', AuthorController::class);
        Route::resource('pages/subs', SubPageController::class)->names('subs');
        Route::resource('pages', PageController::class);
        Route::resource('services', ServiceController::class);
        // Route::get('/contacts/{contact}/acknowledged', [ContactController::class, 'acknowledge'])->name('contact.acknowledge');
        Route::resource('comments', CommentController::class);
        Route::get('/commment/{comment}/approve', [CommentController::class, 'approve'])->name('comment.approve');
        // Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
        // Route::patch('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
        // Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
    });
});
