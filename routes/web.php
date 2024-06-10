<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KonsultasiController;


Route::get('/', [IndexController::class, 'index'])->name('index');;

// Auth routes
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.index');
    Route::get('login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('forgot_password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot_password');
    Route::post('forgot_password', [AuthController::class, 'sendPasswordResetLink']);
});


Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
Route::post('profile/{user}/picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.updateProfilePicture');

Route::get('konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi');

Route::get('resep', [RecipeController::class, 'index'])->name('resep');
Route::get('/resep/{id}', [RecipeController::class, 'show'])->name('resep.detail');

Route::group(['prefix' => 'forum'], function () {
    Route::get('/', [ThreadsController::class, 'index'])->name('forum');
    Route::get('threads_detail/{id}', [ThreadsController::class, 'detail']);
    Route::get('create_threads', [ThreadsController::class, 'CreateIndex'])->name('threads.index');
    Route::post('threads', [ThreadsController::class, 'create'])->name('threads.create');
    Route::post('threads/{thread}/replies/{parentPost?}', [ThreadsController::class, 'reply'])->name('threads.reply');
});

Route::get('artikel', [ArticleController::class, 'show'])->name('artikel');
Route::get('artikel/{id}', [ArticleController::class, 'detail'])->name('artikel.detail');

Route::post('upload-image', [FileUploadController::class, 'uploadImage'])->name('uploadImage');

Route::get('pemantauan_bb', [BmiController::class, 'index']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/artikel/create', [ArticleController::class, 'create'])->name('admin.artikel.create');
    Route::get('/artikel/{type}', [ArticleController::class, 'index'])->name('admin.artikel');
    Route::post('/artikel', [ArticleController::class, 'store'])->name('admin.artikel.store');
    Route::get('/artikel/{id}/edit', [ArticleController::class, 'edit'])->name('admin.artikel.edit');
    Route::put('/artikel/{id}', [ArticleController::class, 'update'])->name('admin.artikel.update');
    Route::delete('/artikel/{id}', [ArticleController::class, 'destroy'])->name('admin.artikel.delete');
    Route::get('/resep', [RecipeController::class, 'AdminIndex'])->name('admin.resep');
    Route::post('/resep', [RecipeController::class, 'store'])->name('admin.resep.store');
    Route::delete('/users/{user}', [AdminController::class, 'removeUser'])->name('admin.users.remove');
    Route::get('/user_list', [AdminController::class, 'userList'])->name('admin.users');
    Route::post('/admin/removeData/{id}/{type}', [AdminController::class, 'removeData'])->name('admin.removeData');
    Route::get('/thread', [AdminController::class, 'threads'])->name('admin.threads');
    Route::delete('/thread/{id}', [AdminController::class, 'removeThread'])->name('admin.removeThread');
    Route::get('post', [AdminController::class, 'posts'])->name('admin.posts');
    Route::delete('post/{id}', [AdminController::class, 'removePost'])->name('admin.removePost');
});
