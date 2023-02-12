<?php

use App\Models\User;
use App\Models\Flower;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
// Route::get('/user', [UserController::class, 'index'])->name('user.index');

// User routes
Route::get('/user/profile/show', [UserController::class, 'show_profile'])->name('user.show_profile');
Route::get('/user/profile/edit', [UserController::class, 'edit_profile'])->name('user.edit_profile');
Route::post('/user/profile', [UserController::class, 'store_profile'])->name('user.store_profile');
Route::get('/user/myarticles/create', [UserController::class, 'create_article'])->name('user.create_article');
Route::post('/user/myarticles/store', [UserController::class, 'store_myarticle'])->name('user.store_myarticle');
Route::get('/user/myarticles/show', [UserController::class, 'show_myarticles'])->name('user.show_myarticles');
Route::delete('/user/myarticles/{id}', [UserController::class, 'delete_myarticle'])->name('user.delete_myarticle');
Route::get('/user/myarticles/{article}/edit', [UserController::class, 'edit_myarticle'])->name('user.edit_myarticle');
Route::put('/user/myarticles/{article}/update', [UserController::class, 'update_myarticle'])->name('user.update_myarticle');
Route::get('/user/{user}/dashbord', [UserController::class, 'dashbord'])->name('user.dashbord');

Route::get('/user/articles/newestArticles', [UserController::class, 'newestArticles'])->name('user.newestArticles');
Route::get('/user/articles/bestArticles', [UserController::class, 'bestArticles'])->name('user.bestArticles');
Route::get('/user/articles/category/{category}', [UserController::class, 'categoryArticles'])->name('user.categoryArticles');
Route::get('/user/writers/bestWrites', [UserController::class, 'bestWriters'])->name('user.bestWriters');

Route::get('/user/articles/{article}', [UserController::class, 'show_article'])->name('user.show_article');
Route::post('/user/articles/{article}/comment/store', [UserController::class, 'store_comment'])->name('user.store_comment');
Route::post('/user/articles/{article}/like/store', [UserController::class, 'store_like'])->name('user.store_like');
Route::post('/user/articles/{article}/save', [UserController::class, 'save_article'])->name('user.save_article');
Route::get('/user/saved/articles', [UserController::class, 'show_savedlist'])->name('user.show_savedlist');
Route::delete('/user/saved/articles/{article}', [UserController::class, 'delete_savedarticle'])->name('user.delete_savedarticle');
Route::post('/user/articles/{writer}/follow', [UserController::class, 'follow'])->name('user.follow');
Route::delete('/user/account/delete', [UserController::class, 'delete_account'])->name('user.delete_acount');



// admin routes
Route::get('/admin/panel', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/panel/articles/{type}/categories', [AdminController::class, 'show_categoris'])->name('admin.show_categories');
Route::get('/admin/panel/articles/{type}/show/category/{category}', [AdminController::class, 'show_certain_list_articles'])->name('admin.show_list_articles');
Route::get('/admin/panel/articles/{article}', [AdminController::class, 'show_article'])->name('admin.show_article');
Route::post('/admin/panel/articles/{article}/change/category', [AdminController::class, 'change_category'])->name('admin.change_category');
Route::post('/admin/panel/articles/{article}/change/status', [AdminController::class, 'change_status'])->name('admin.change_status');
Route::delete('/admin/panel/articles/{article}/delete', [AdminController::class, 'delete_article'])->name('admin.delete_article');
Route::get('/admin/panel/users/{status}', [AdminController::class, 'show_users_list'])->name('admin.show_users_list');
Route::get('/admin/panel/user/{user}/profile/edit', [AdminController::class, 'edit_user_profile'])->name('admin.edit_user_profile');
Route::post('/admin/panel/user/{user}/profile/store', [AdminController::class, 'store_profile'])->name('admin.store_profile');
Route::get('/admin/panel/comments/newest', [AdminController::class, 'show_comments'])->name('admin.show_comments');
Route::post('/admin/panel/comments/delete', [AdminController::class, 'delete_comment'])->name('admin.delete_comment');


Route::get('/',[HomeController::class, 'index'] )->name('home');
Route::get('/ourstory',[HomeController::class, 'our_story'] )->name('our_story');
Route::get('/contact',[HomeController::class, 'contact_us'] )->name('contact_us');
Route::get('/search',[HomeController::class, 'search'] )->name('search');



Auth::routes();

