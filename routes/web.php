<?php

use App\Livewire\Category;
use App\Livewire\CategoryCreate;
use App\Livewire\CategoryEdit;
use App\Livewire\EditPost;
use App\Livewire\Post;
use App\Livewire\PostCreate;
use App\Livewire\ShowPost;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/posts', Post::class)->name('admin.posts.posts');
    Route::get('/posts/create', PostCreate::class)->name('admin.posts.postCreate');
    Route::get('/posts/edit/{post}', EditPost::class)->name('admin.posts.editPost');
    Route::get('/posts/{post}', ShowPost::class);
    
    Route::get('/categories', Category::class)->name('admin.categories.category');
    Route::get('/categories/create', CategoryCreate::class)->name('admin.categories.categoryCreate');
    Route::get('/categories/edit/{category}', CategoryEdit::class)->name('admin.categories.categoryEdit');
  });
