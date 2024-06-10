<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;


Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');


Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/posts', [AdminController::class, 'managePosts'])->name('admin.manage-posts');
    Route::get('/posts/{id}/edit', [AdminController::class, 'editPost'])->name('admin.edit-post');
    Route::post('/posts/{id}/edit', [AdminController::class, 'updatePost'])->name('admin.update-post');
    Route::delete('/posts/{id}', [AdminController::class, 'deletePost'])->name('admin.delete-post');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});


Route::resource('posts', PostController::class);

Route::get('/create', function () {
    return view('posts.create');
})->middleware(['auth', 'verified'])->name('posts.create');

Route::get('/posts', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('posts.index');




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
