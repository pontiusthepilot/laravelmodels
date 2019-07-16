<?php

// http://localhost/laravelmodels/public/home

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
    return view('welcome');
});

Route::resource('projects', 'ProjectsController');

// Line 18 is the equivalent of all of this:

/*
Route::get('/projects', 'ProjectsController@index');

Route::post('/projects', 'ProjectsController@store');

Route::get('/projects/create', 'ProjectsController@create');

Route::get('/projects/{$project}', 'ProjectsController@'show');

Route::get('/projects/{$project}/edit', 'ProjectsController@edit');

Route::patch('/projects/{$project}', 'ProjectsController@update');

Route::delete('projects/{$project}', 'ProjectsController@destroy');
*/

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
