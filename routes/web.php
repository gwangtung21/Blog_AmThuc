<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);

    // Routes for authors
    Route::prefix('author')->name('author.')->group(function () {
        Route::get('dashboard', [AuthorController::class, 'dashboard'])->name('dashboard');
        Route::get('post', [AuthorController::class, 'create'])->name('post.create');
        Route::post('post', [AuthorController::class, 'store'])->name('post.store');
        Route::get('post/{id}/edit', [AuthorController::class, 'edit'])->name('post.edit');
        Route::put('post/{id}', [AuthorController::class, 'update'])->name('post.update');
    });

    // Routes for admins
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('users', [AdminController::class, 'manageUsers'])->name('users.manage');
        Route::get('posts', [AdminController::class, 'moderatePosts'])->name('posts.moderate');
    });
});


Route::get('/home', [PostController::class, 'index'])->name('home'); // Trang chủ hiển thị bài viết

Route::get('/create', [PostController::class, 'create'])->name('posts.create'); // Form tạo bài viết
Route::post('/store', [PostController::class, 'store'])->name('posts.store'); // Xử lý lưu bài viết
