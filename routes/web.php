<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogviewController;
use App\Http\Controllers\FaqviewController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\MailListController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// home page
Route::get('/' , [HomeController::class, 'index'])->name('home');

// contact page
Route::get('/contact' , [ContactController::class, 'index']);
Route::post('/contact',[ContactController::class, 'store']);

// help_center page
// Route::get('/help_center', [HelpController::class, 'index']);
Route::resource('/help_center', HelpController::class);

Route::resource('/tenant', TenantController::class);

Route::resource('/owner', OwnerController::class);

Route::resource('/others', OwnerController::class);

Route::resource('/faq_view', FaqviewController::class);

// blog page
Route::get('/blog', [BlogController::class, 'index']);

// blog view page

Route::get('/blog_view/{blog_view}', [BlogviewController::class, 'show']);

// about
Route::get('/about', [AboutController::class,'index']);
// mail
Route::resource('/mail', MailListController::class);

// service    
Route::get('/services', [ServiceController::class,'index'])->name('services');
Route::get('/services/{services}', [serviceController::class, 'show']);

// comment
Route::POST('/comment',[CommentController::class, 'store']);