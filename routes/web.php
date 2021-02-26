<?php
use Illuminate\Support\Facades\Auth;
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


Route::get('/sample', function () {
    return view('sample');
});

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->middleware('verified')->name('home');

Route::get('/profile/{id}/edit', 'UserProfileUpdateController@edit')->middleware('verified')->name('profile.edit');
Route::put('/profile/{id}', 'UserProfileUpdateController@update')->middleware('verified')->name('profile.update');