<?php

use App\Http\Controllers\Dashboard\PostController;
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


Route::get('/', function (){
    return view('welcome');
} );


Route::resource('post', PostController::class);

Route::get('post', [PostController::class, 'index']);
//El store es el index en este curso de laravel
Route::get('show', [PostController::class, 'show']);
Route::get('create', [PostController::class, 'create']);
Route::get('edit', [PostController::class, 'edit']);

//Route::post('post', [PostController::class, 'store']);
Route::put('update', [PostController::class, 'update']);
Route::delete('destroy', [PostController::class, 'destroy']);