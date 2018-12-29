<?php

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

/*  Naming conventions in routes
    GET /projects (index) -- request to get all data
    GET /projects/create (create) -- request to create data using form
    GET /projects/1 (show) -- request to show specific project from database
    POST /projects (store) -- requst to persist (store) data in database
    GET /projects/1/edit -- request to edit specific data
    PATCH /projects/1 (update) -- request specific data to be updated
    DELETE /projects/1 (destroy)  -- request to delete specific data
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/projects', 'ProjectsController@index');
// Route::get('/projects/create', 'ProjectsController@create');
// Route::get('/projects/{id}', 'ProjectsController@show');
// Route::post('/projects', 'ProjectsController@store');
// Route::get('/projects/{id}/edit', 'ProjectsController@edit');
// Route::patch('/projects/{id}', 'ProjectsController@update');
// Route::delete('/projects/{id}', 'ProjectsController@destroy');

//and shortcut to all 7 operations is to create route like this it contains all of the above automatically

Route::resource('projects', 'ProjectsController');

// since we created controller we don't need route to patch it with old one
// Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::delete('/projects/{project}/tasks', 'ProjectTasksController@destroy');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
