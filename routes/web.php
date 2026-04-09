<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\PostController as AdminPostController;



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/author', function () {
    return view('pages.author');
})->name('author');

Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/blog/filter', [PostController::class, 'filter'])->name('blog.filter');
Route::get('/blog/{id}', [PostController::class, 'show'])->name('posts.show');


Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');


Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('/posts', AdminPostController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
