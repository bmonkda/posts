<?php

use App\Http\Controllers\PostController;
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

Route::resource('posts', PostController::class)->names('posts');
// Route::get('/getSubcategorias/{categoria}', [PostController::class, 'getSubcategorias']);


Route::get('/categorias', [PostController::class, 'getCategorias']);
Route::get('/categorias/{categoria}/subcategorias', [PostController::class, 'getSubcategorias']);
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'storeOrUpdatePost']);
Route::put('/posts/{id}', [PostController::class, 'storeOrUpdatePost']);