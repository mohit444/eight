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
/*Route::get('/todo', [App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');
Route::get('/todo/create', [App\Http\Controllers\TodoController::class, 'create']);
Route::post('/todo/create', [App\Http\Controllers\TodoController::class, 'store']);
Route::get('/todo/{todo}/edit',[App\Http\Controllers\TodoController::class, 'edit']);
Route::patch('/todo/{todo}/update',[App\Http\Controllers\TodoController::class, 'update'])->name('todo.update');
Route::delete('/todo/{todo}/delete',[App\Http\Controllers\TodoController::class, 'delete'])->name('todo.delete');
*/

Route::middleware('auth')->group(function(){
    Route::resource('todo',App\Http\Controllers\TodoController::class);
    Route::put('/todo/{todo}/completed',[App\Http\Controllers\TodoController::class, 'completed'])->name('todo.completed');
    Route::put('/todo/{todo}/incompleted',[App\Http\Controllers\TodoController::class, 'incompleted'])->name('todo.incompleted');
    Route::get('/user',[App\Http\Controllers\UserController::class, 'index']);
    Route::post('/upload',[App\Http\Controllers\UserController::class, 'uploadAvatar']);
});




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
