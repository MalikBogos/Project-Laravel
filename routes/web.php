<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\HomeController;

use \App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Kernel;

// example
Route::get('/adminpage', [HomeController::class, 'page'])->name('admin.page')->middleware('admin');


Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.showForm');
Route::post('/contact/submit', [ContactController::class, 'submitForm'])->name('contact.submit');


// needs admin auth middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/messages', [ContactController::class, 'showMessages'])->name('contact.messages');

    Route::get('/admin/edit-categories', [FaqCategoryController::class, 'index'])->name('faq.categories.index');
    Route::post('/admin/edit-categories', [FaqCategoryController::class, 'store'])->name('faq.categories.store');
    Route::put('/admin/edit-categories/{category}', [FaqCategoryController::class, 'update'])->name('faq.categories.update');
    Route::delete('/admin/edit-categories/{category}', [FaqCategoryController::class, 'destroy'])->name('faq.categories.destroy');

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/posts', [AdminController::class, 'managePosts'])->name('admin.manage-posts');
    Route::get('/posts/{id}/edit', [AdminController::class, 'editPost'])->name('admin.edit-post');
    Route::post('/posts/{id}/edit', [AdminController::class, 'updatePost'])->name('admin.update-post');
    Route::delete('/posts/{id}', [AdminController::class, 'deletePost'])->name('admin.delete-post');

    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/faq/{faq}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/faq/{faq}/update', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{faq}/destroy', [FaqController::class, 'destroy'])->name('faq.destroy');
});
    

// Public FAQ route
    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// // Admin routes for managing FAQs
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');
//     Route::resource('faq/categories', FaqCategoryController::class)->except(['index', 'show']);
//     Route::resource('faq', FaqController::class)->except(['index', 'show']);
// });

// Route::get('/faq/{faq}/edit', [FaqController::class, 'edit'])->name('/admin/edit-faq');

    



Route::resource('posts', PostController::class);

Route::get('/create', function () {
    return view('posts.create');
})->middleware(['auth', 'verified'])->name('posts.create');

Route::get('/posts', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('posts.index');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::middleware(['auth'])->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
