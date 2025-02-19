<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/world', function () {
   return 'World';
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'about']);

Route::get('/user/{name}', function ($name) {
   return 'Nama Saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
   return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

Route::get('/articles/{id}', [ArticlesController::class, 'articles']);

Route::get('/user/{name?}', function ($name = 'John') {
   return 'Nama saya ' . $name;
});

use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only([
   'index',
   'show'
]);
Route::resource('photos', PhotoController::class)->except([
   'create',
   'store',
   'update',
   'destroy'
]);

Route::get('/greeting', [WelcomeController::class, 'greeting']);
   