<?php

use App\Http\Controllers\EventAPIController;
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

/***************************************************************************************
 ** Learners
 ***************************************************************************************/
Route::get('/getLearner/{learner}', 'LearnerController@getLearner');
Route::get('/getAuthLearner', 'LearnerController@getAuthLearner');
Route::post('/updateLearner/{learner}', 'LearnerController@updateLearner');

/***************************************************************************************
 ** Login
 ***************************************************************************************/
Route::post('auth/login', 'LoginController@login');

/***************************************************************************************
 ** Logout
 ***************************************************************************************/
Route::post('auth/logout', 'LogoutController@logout');

/***************************************************************************************
 ** Built-in API
 ***************************************************************************************/
Route::get('domain', function () {
    return env('APP_NAME');
});

Route::get('events', [EventAPIController::class, 'index']);
