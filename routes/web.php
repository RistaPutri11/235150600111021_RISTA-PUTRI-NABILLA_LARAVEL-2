<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('index');
});
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

// Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');

// Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');

// Route::post('/tambah', [BlogController::class, 'createBlog']);

// Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');

// Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

Route::get('/foto', [FotoController::class, 'show']);

Route::resource('blogs', BlogController::class);

// Route::post('/blogs', [BlogController::class, 'createBlog'])->name('blogs.store');

Route::get('/blogs', [BlogController::class, 'index']);

// Route Autentication
Route::middleware('auth')->group(function () {
    Route::get('/blogs', [BlogController::class, 'showBlogs']);
    Route::get('/blogs/create', [BlogController::class, 'tambahBlog']);
    Route::post('/blogs/create', [BlogController::class, 'createBlog']);
});


// Route::get('/blogs', [BlogController::class, 'showBlogs'])->name('blogs.index');
// Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
// Route::post('/blogs', [BlogController::class, 'createBlog'])->name('blogs.store');
// Route::get('/blogs/{id}', [BlogController::class, 'showBlog'])->name('blogs.show');
// Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
// Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
// Route::delete('/blogs/{id}', [BlogController::class, 'deleteBlog'])->name('blogs.delete');

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
