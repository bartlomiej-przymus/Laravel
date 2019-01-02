<?php

use Illuminate\Http\Request;
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
// Route::get('/', function (Request $request) {
//     //$request->session()->put('foobar', 'baz');
//     return $request->session()->get('foobar');
// });

Route::get('projects/create', function () {
    return view('projects.create');
});

Route::post('projects', function () {
    //validate project
    //save project
    session()->flash('message','Your project has been created'); //storing for single request
    return redirect('/');
});

Route::get('/', function () {
    return view('welcome');
});
