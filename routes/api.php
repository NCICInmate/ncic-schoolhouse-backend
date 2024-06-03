<?php

use App\Http\Controllers\EventAPIController;
use EscolaLms\Consultations\Enum\ConsultationTermStatusEnum;
use EscolaLms\Consultations\Models\ConsultationUserPivot;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnerController;

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
Route::post('/updateLearner/{learner}', 'LearnerController@updateLearner');

/***************************************************************************************
 ** Built-in API
 ***************************************************************************************/
Route::get('domain', function () {
    return env('APP_NAME');
});

Route::get('events', [EventAPIController::class, 'index']);
