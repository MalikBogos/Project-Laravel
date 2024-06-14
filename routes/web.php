<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AvatarController;
use \App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Models\Comment;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Kernel;

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.showForm');
Route::post('/contact/submit', [ContactController::class, 'submitForm'])->name('contact.submit');


// needs admin auth middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminpage', [HomeController::class, 'page'])->name('admin.page');
    Route::get('/admin/messages', [ContactController::class, 'showMessages'])->name('contact.messages');
    Route::get('/admin/edit-categories', [FaqCategoryController::class, 'index'])->name('faq.categories.index');
    Route::post('/admin/edit-categories', [FaqCategoryController::class, 'store'])->name('faq.categories.store');
    Route::put('/admin/edit-categories/{category}', [FaqCategoryController::class, 'update'])->name('faq.categories.update');
    Route::delete('/admin/edit-categories/{category}', [FaqCategoryController::class, 'destroy'])->name('faq.categories.destroy');
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/admin/users/{user}/update-usertype', [UserController::class, 'updateUsertype'])->name('users.updateUsertype');
    Route::get('admin/users/create', 'App\Http\Controllers\UserController@create')->name('users.create');
    Route::delete('admin/users/{user}', 'App\Http\Controllers\UserController@destroy')->name('users.destroy');
    Route::post('admin/users', 'App\Http\Controllers\UserController@store')->name('users.store');
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/posts/{id}', [AdminController::class, 'deletePost'])->name('admin.delete-post');
    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/faq/{faq}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/faq/{faq}/update', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{faq}/destroy', [FaqController::class, 'destroy'])->name('faq.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/avatar-upload', [AvatarController::class, 'upload'])->name('avatar.upload');
    Route::delete('/profile/avatar-reset', [AvatarController::class, 'reset'])->name('avatar.reset');
    Route::post('/posts/{postId}/comments', [PostController::class, 'storeComment'])->name('posts.storeComment');  
    Route::resource('posts', PostController::class);
  
});




Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::resource('posts', PostController::class);
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/users/{user:name}', [ProfileController::class, 'show'])->name('user.profile');






require __DIR__.'/auth.php';
