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

Route::get ('/signup',[\App\Http\Controllers\mainController::class, 'signupAction']);
Route::post('/dbAction',[\App\Http\Controllers\mainController::class, 'dbAction']);

Route::get('/', function () {
    return view('welcome');
});
