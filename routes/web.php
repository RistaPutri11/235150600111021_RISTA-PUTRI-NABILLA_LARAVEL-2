<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'login'])->middleware('web');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 
require __DIR__.'/auth.php';
// create.blade
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogController::class, 'createBlog'])->name('blogs.store');

// edit.blade
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');

// index.blade
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

// list.blade
Route::get('/blogs', [BlogController::class, 'showBlogs'])->name('blogs.list');

//show.blade
Route::get('/blogs/{id}', [BlogController::class, 'showBlog'])->name('blogs.show');

// tambah blog 
Route::get('/tambah', [BlogController::class, 'tambahBlog'])->name('blogs.create');

Route::get('/blogs', [BlogController::class, 'showBlogs']);

Route::get('/blogs/{id}', [BlogController::class, 'showBlog']);

Route::delete('/blogs/{id}', [BlogController::class, 'deleteBlog']);

Route::get('/foto', [FotoController::class, 'show']);

Route::resource('blogs', BlogController::class);

// Route::post('/blogs', [BlogController::class, 'createBlog'])->name('blogs.store');

Route::get('/blogs', [BlogController::class, 'index']);

// Route Autentication
Route::middleware('auth')->group(function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
});

// Route untuk menampilkan daftar blog
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

// Route untuk form membuat blog baru
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');

// Rute untuk halaman daftar blog
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

// Rute untuk halaman tambah blog
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');

// Rute untuk menyimpan data blog baru
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');

// Rute untuk halaman edit blog
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');

// Rute untuk update blog
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');

// Rute untuk hapus blog
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
Route::resource('blogs', BlogController::class);

// Rute untuk menampilkan daftar blog (index)
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

// Rute untuk membuat blog baru
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');

// Rute untuk menyimpan blog yang baru dibuat
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');


Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');

Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])
     ->name('login');

Route::post('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);

Route::get('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])
     ->name('register');

Route::post('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);

Route::get('/forgot-password', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])
     ->name('password.request');

Route::post('/forgot-password', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])
     ->name('password.email');

// Route untuk logout
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
     ->name('logout');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::resource('blogs', BlogController::class);
Route::resource('blogs', App\Http\Controllers\BlogController::class);

//menampilkan daftar blog
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.list');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/list', [BlogController::class, 'list'])->name('blogs.list');
Route::get('/blogs/list', [BlogController::class, 'index'])->name('blogs.list');

Route::middleware('auth')->group(function () {
     Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
     Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
     Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
     
 });
 
 Route::get('/', [BlogController::class, 'index'])->name('index');

