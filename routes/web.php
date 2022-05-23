<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;


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

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});



Route::get('/about', function() {
    return view('about' , [
        "title" => "About",
        "active" => 'home',
        "name" => "Danang Prenadi",
        "email" => "prenadi.d@gmail.com"
        // "image" => ""
    ]);
});

// Route::get('/posts', [PostController::class, 'index']);
// Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route Dashboard
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

// Route Sluggable
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// Route DashboardPostController
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Route AdminCategoryController
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

//Route Comments
Route::post('/comments', [PostController::class, 'postComments']);
Route::get('/countComments/{id}', [CommentController::class, 'countComments']);

//Route Likes
Route::get('/likes/{id}', [LikeController::class, 'likes']);

// Route Sluggable
Route::get('/posts/checkSlug', [PostController::class, 'checkSlug']);

// Route PostController
Route::resource('/posts', PostController::class)->middleware('auth');




// Route::get('/categories/{category:slug}', function(Category $category) {
//     return view('posts', [
//         'title' => "Post by Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author')
//     ]);
// });

// Route::get('/categories/{category:slug}', function(Category $category) {
//     return view('category', [
//         'title' => "Post by Category : $category->name",
//         'posts' => $category->posts,
//         'category' => $category->name
//     ]);
// });

// lebih baik di buat view dan controller terpisah
// Route::get('/authors/{author:username}', function(User $author) {
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'author')
//         // N+1 Problem -> Eager Lazy Loading (load)
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $user) {
//     return view('posts', [
//         'title' => 'User Posts',
//         'posts' => $user->posts
//     ]);
// });
