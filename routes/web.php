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

Route::get('/', 'ContentsController@home')->name('home');
Route::get('/clients', 'ClientController@index')->name('clients');
Route::get('/clients/new', 'ClientController@newClient')->name('new_client');
Route::post('/clients/new', 'ClientController@create')->name('create_client');
Route::get('/clients/{clients_id}', 'ClientController@show')->name('show_client');
Route::post('/clients/modify/{clients_id}', 'ClientController@modify')->name('update_client');
Route::get('reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('');
Route::post('reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('');
Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom')->name('');

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

Route::get('/facades/db', function () {
    
    return DB::select('SELECT * from table');
});

Route::get('/facades/encrypt', function () {
    
    return Crypt::encrypt('123456789');
});

//JpdiI6IlZBWnQrZmJweHpNQjFjOUw3blYzVmc9PSIsInZhbHVlIjoiSncrZGJCSEZSd20wVGRIRzR5SEExZjlFb2tUQW9ZaFUxclY2WnBaWmNqVT0iLCJtYWMiOiI4NWM0N2U4ZDk1ZmQ5MGMzZTVhOTE1YWNjMWRmMTAyMzkzM2UxZDBmYzUyNmU4MjdlYmI3NzQwOTFlMDg1NjVmIn0=
//eyJpdiI6IlV6UVM4NGh6UUtzU3JsQittMFdJcVE9PSIsInZhbHVlIjoiXC9CS2d3TmFxWlFyMU52VWpKdzB6UHE3SDRxMEw2dVNyR1wvOEJQYm1TY2hnPSIsIm1hYyI6IjhhNDgxM2Q4MGZjOWJhMTEyNDYxMWUxZTlmZDU0NTY0ZWUyMzBmMDg1ZjFjYWM0ZmNmMTQzNTk0NGExYzZlNmMifQ==
Route::get('/facades/decrypt', function () {
    $code = 'eyJpdiI6IlV6UVM4NGh6UUtzU3JsQittMFdJcVE9PSIsInZhbHVlIjoiXC9CS2d3TmFxWlFyMU52VWpKdzB6UHE3SDRxMEw2dVNyR1wvOEJQYm1TY2hnPSIsIm1hYyI6IjhhNDgxM2Q4MGZjOWJhMTEyNDYxMWUxZTlmZDU0NTY0ZWUyMzBmMDg1ZjFjYWM0ZmNmMTQzNTk0NGExYzZlNmMifQ==';
    //return Crypt::decrypt('eyJpdiI6IlV6UVM4NGh6UUtzU3JsQittMFdJcVE9PSIsInZhbHVlIjoiXC9CS2d3TmFxWlFyMU52VWpKdzB6UHE3SDRxMEw2dVNyR1wvOEJQYm1TY2hnPSIsIm1hYyI6IjhhNDgxM2Q4MGZjOWJhMTEyNDYxMWUxZTlmZDU0NTY0ZWUyMzBmMDg1ZjFjYWM0ZmNmMTQzNTk0NGExYzZlNmMifQ==');
    return Crypt::decrypt($code);
});

