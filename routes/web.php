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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return '<h3>About</h3>';
});

Route::get('/array', function () 
{
    $response_arr = [];
    $response_arr['author'] = 'BP';
    $response_arr['version'] = '0.1.1';

    return $response_arr;
});

Route::get('/home', function () {
    $data = [];
    $data['version'] = '0.1.1';
    return view('home', $data);
});

Route::get('/di', 'ClientController@di');
