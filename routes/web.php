<?php

use App\Http\Controllers\admins\AdminsController;
use App\Http\Controllers\categories\CategoriesController;
use App\Http\Controllers\posts\PostsController;
use App\Http\Controllers\users\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [PostsController::class, 'index'])->name('home');
Route::get('/', [PostsController::class, 'index'])->name('welcome');
Route::get('/contact', [PostsController::class, 'contact'])->name('contact');
Route::get('/about', [PostsController::class, 'about'])->name('about');

Route::controller(PostsController::class)->group(function () {
    Route::get('/posts/index', 'index')->name('posts.index');
    Route::get('/single/{post}', 'single')->name('posts.single');
    Route::post('/post/comment-store', 'storeComment')->name('comment.store')->middleware('auth');
    Route::get('/post/create-post', 'createPost')->name('post.create')->middleware('auth');
    Route::post('/post/post-store', 'storePost')->name('post.store')->middleware('auth');
    Route::get('/post/post-delete/{post}', 'deletePost')->name('posts.delete')->middleware('can:delete,post');
    Route::get('/post/{post}/edit', 'editPost')->name('posts.edit')->middleware('can:update,post');
    Route::put('/post/{post}', 'updatePost')->name('posts.update')->middleware('can:update,post');
    Route::any('/posts/search', 'search')->name('posts.search');
});

Route::controller(CategoriesController::class)->group(function () {
    Route::get('/category/{category}', 'category')->name('category.single');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/user/{user}/edit', 'updateProfile')->name('users.update')->middleware('can:update,user');
    Route::put('/user/{user}', 'editProfile')->name('users.edit')->middleware('can:update,user');
    Route::get('/profile/{user}', 'profile')->name('single.profile');
});

Route::controller(AdminsController::class)->prefix('admin')->group(function () {
    Route::get('/login', 'viewLogin')->name('admins.login');
    Route::post('/login', 'checkLogin')->name('admins.checkLogin');
    Route::get('/', 'index')->name('admins.dashboard');
    Route::get('/list', 'showAdmins')->name('admins.list');
    Route::get('/create', 'createAdmins')->name('admins.create');
    Route::post('/store', 'storeAdmins')->name('admins.store');
    Route::get('/categories', 'showCategories')->name('admins.categories');
    Route::get('/create-category', 'createCategory')->name('admins.create-category');
    Route::post('/storecategory', 'storeCategory')->name('admins.store-category');
    Route::post('/deletecategory/{category}', 'deleteCategory')->name('admins.delete-category');
    Route::get('/updatecategory/{category}', 'updateCategory')->name('admins.update-category');
    Route::post('/editcategory/{category}', 'editCategory')->name('admins.edit-category');
    Route::get('/posts', 'showPosts')->name('admins.posts');
    Route::post('/deletepost/{post}', 'deletePost')->name('admins.delete-post');
});
