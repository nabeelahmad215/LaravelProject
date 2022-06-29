<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('getpersons', [App\Http\Controllers\homecontroller::class, 'testapi']);

Route::get('user', [App\Http\Controllers\testcontroller::class, 'dbAction']);

Route::post('register', [App\Http\Controllers\mainController::class, 'reactRegister']);
Route::post('reactlogin', [App\Http\Controllers\mainController::class, 'reactLogin']);
Route::get('dropdown', [App\Http\Controllers\mainController::class, 'index']);
Route::get('empdropdown', [App\Http\Controllers\mainController::class, 'emp_dropdown']);
Route::post('emp-info', [App\Http\Controllers\mainController::class, 'reactEmpInfo']);
Route::get('empinfohistory', [App\Http\Controllers\mainController::class, 'reactEmpInfoHistory']);
Route::get('/empinfodelete/{id}', [App\Http\Controllers\mainController::class, 'reactEmpDeleteAction']);
Route::get('/empinfoedit/{id}', [App\Http\Controllers\mainController::class, 'reactEmpEditAction']);
Route::post('/empinfoupdate/{id}', [App\Http\Controllers\mainController::class, 'reactEmpUpdateAction']);
Route::post('resignation', [App\Http\Controllers\mainController::class, 'reactEmpResignation']);
Route::get('resignationhistory', [App\Http\Controllers\mainController::class, 'reactResignationHistory']);
Route::get('/resignationdelete/{id}', [App\Http\Controllers\mainController::class, 'reactResignDeleteAction']);
Route::get('/edit-resign/{id}', [App\Http\Controllers\mainController::class, 'reactResignEditAction']);
Route::post('/resignupdate/{id}', [App\Http\Controllers\mainController::class, 'reactResignUpdateAction']);
Route::post('/statusupdate/{id}', [App\Http\Controllers\mainController::class, 'reactStatusUpdateAction']);
Route::get('empfetch/{id}', [App\Http\Controllers\mainController::class, 'reactEmpFetch']);
Route::post('promotion', [App\Http\Controllers\mainController::class, 'reactEmpPromotion']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
