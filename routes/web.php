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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/specialties', 'SpecialtyController@index');
Route::get('/specialties/create', 'SpecialtyController@create'); //form register
Route::post('/specialties', 'SpecialtyController@store'); //envio del register
Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit'); //form edit
Route::put('/specialties/{specialty}', 'SpecialtyController@update'); // envio edit
Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy'); // borrar registro

//Doctors
Route::resource('doctors','DoctorController');

//Patients

