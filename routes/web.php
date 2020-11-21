<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

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

Route::get('contacts', [
    'uses' => 'App\Http\Controllers\ContactsController@index',
    'as' => 'contacts.index'
]);
Route::post('contacts', [
    'uses' => 'App\Http\Controllers\ContactsController@store',
    'as' => 'contacts.store'
]);
Route::get('contacts/create', [
    'uses' => 'App\Http\Controllers\ContactsController@create',
    'as' => 'contacts.create'
]);
Route::get('contacts/{contact}', [
    'uses' => 'App\Http\Controllers\ContactsController@show',
    'as' => 'contacts.show'
]);
Route::match(['put', 'patch'], 'contacts/{contact}', [
    'uses' => 'App\Http\Controllers\ContactsController@update',
    'as' => 'contacts.update'
]);
Route::delete('contacts/{contact}', [
    'uses' => 'App\Http\Controllers\ContactsController@destroy',
    'as' => 'contacts.destroy'
]);
Route::get('contacts/{contact}/edit', [
    'uses' => 'App\Http\Controllers\ContactsController@edit',
    'as' => 'contacts.edit'
]);