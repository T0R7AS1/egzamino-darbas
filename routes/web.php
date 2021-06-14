<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware('auth');
// Tasks CRUD
Route::get('tasks', 'App\Http\Controllers\TasksController@index')->name('tasks.index')->middleware('auth');
Route::get('show/tasks{id}', 'App\Http\Controllers\TasksController@show')->name('tasks.show')->middleware('auth');
Route::get('tasks/create', 'App\Http\Controllers\TasksController@create')->name('create.tasks')->middleware('auth');
Route::post('tasks/store', 'App\Http\Controllers\TasksController@store')->name('tasks.store')->middleware('auth');
Route::get('edit/tasks{id}', 'App\Http\Controllers\TasksController@edit')->middleware('auth');
Route::post('update/tasks{id}', 'App\Http\Controllers\TasksController@update')->middleware('auth');
Route::get('delete/tasks{id}', 'App\Http\Controllers\TasksController@delete')->middleware('auth');

// Statuses CRUD
// Route::get('statuses', 'App\Http\Controllers\StatusesController@index')->name('statuses.index')->middleware('auth');
Route::get('statuses', [App\Http\Controllers\StatusesController::class, 'index'])->name('statuses.index')->middleware('auth');

Route::get('show/statuses{id}', 'App\Http\Controllers\StatusesController@show')->name('statuses.show')->middleware('auth');

Route::get('statuses/create', 'App\Http\Controllers\StatusesController@create')->name('create.statuses')->middleware('auth');
Route::post('statuses/store', 'App\Http\Controllers\StatusesController@store')->name('statuses.store')->middleware('auth');

Route::get('edit/statuses{id}', 'App\Http\Controllers\StatusesController@edit')->middleware('auth');
Route::post('update/statuses{id}', 'App\Http\Controllers\StatusesController@update')->middleware('auth');

Route::get('delete/statuses{id}', 'App\Http\Controllers\StatusesController@delete')->middleware('auth');
// Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
