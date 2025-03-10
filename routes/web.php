<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\postController;
use App\Models\Post;
use App\Http\Controllers\LikeController;
use App\Models\Like;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Models\Category;

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('registerForm', [AuthController::class, 'register'])->name('registerForm');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard',[PostController::class,'viewPost'])
->middleware(['auth','verified'])->name('dashboard');


Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');


 Route::get('/admin/CategoryEdit', [AdminController::class, 'CategoryEdit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.CategoryEdit');

Route::put('/admin/CategoryUpdate/{category}', [AdminController::class, 'CategoryUpdate'])
    ->middleware(['auth', 'verified'])
    ->name('admin.CategoryUpdate');


    Route::delete('/admin/CategoryDelete/{category}', [AdminController::class, 'CategoryDelete'])
    ->middleware(['auth', 'verified'])
    ->name('admin.CategoryDelete');






route::get('/category/{id}', [PostController::class,'postSorting'])
->Middleware(['auth','verified'])->name('category.posts');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('post',[postController::class, 'create'])->name('post');
Route::post('store/post', [PostController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('store.post');

Route::get('/posts/create', [PostController::class, 'showCreate'])->name('posts.create');
Route::post('/like-post', [LikeController::class, 'likePost'])->name('like.post');

Route::post('/comments/{id}', [CommentController::class, 'store'])->name('comments.post');
Route::get('/comments/{post}', [CommentController::class, 'index'])->name('comments.show');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); // Everyone can read

//     Route::middleware(['role:admin'])->group(function () {
//         Route::resource('posts', PostController::class)->except(['index']); // Admin can do everything
//     });

//     Route::middleware(['role:author'])->group(function () {
//         Route::resource('posts', PostController::class)->except(['index', 'destroy']); // Author can manage but not delete
//     });
// });
require __DIR__.'/auth.php';
