<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/todo', [App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');
Route::get('/', [App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');
Route::get('/todo/create', [App\Http\Controllers\TodoController::class, 'create']);
Route::post('/todo/create', [App\Http\Controllers\TodoController::class, 'store']);
Route::get('/todo/{todo}/edit',[App\Http\Controllers\TodoController::class, 'edit']);
Route::patch('/todo/{todo}/update',[App\Http\Controllers\TodoController::class, 'update'])->name('todo.update');
Route::put('/todo/{todo}/completed',[App\Http\Controllers\TodoController::class, 'completed'])->name('todo.completed');


/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/user',[App\Http\Controllers\UserController::class, 'index']);

Route::post('/upload',[App\Http\Controllers\UserController::class, 'uploadAvatar']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
