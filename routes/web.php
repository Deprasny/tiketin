<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/station', function () {
    return view('station.index');
})->name('station.index')->middleware('admin');
Route::get('/train', function () {
    return view('train.index');
})->name('train.index')->middleware('admin');
Route::get('/passanger', function () {
    return view('passanger.index');
})->name('passanger.index')->middleware('admin');
Route::get('/ticket', function () {
    return view('ticket.index');
})->name('ticket.index')->middleware('admin');

Route::get('/buyticket', function () {
    return view('buyticket.index');
})->name('buyticket.index');
Route::get('/user', function () {
    return view('user_dashboard.index');
})->name('user.index');

Route::get('/about', function () {
    return view('about');
})->name('about')->middleware('admin');
