<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);

Route::resource('posts', PostsController::class);


// Route::get('/posts/create', [PostsController::class, 'create']);
// Route::post('./posts', [PostsController::class, 'store']);

// Route::put('./posts/{post}', [PostsController::class, 'edit']);
// Route::get('./posts/{post}/edit', [PostsController::class, 'update']);










   


// Route::get('/user/{id}', function ($id) {
//     return "this is a user $id";
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
