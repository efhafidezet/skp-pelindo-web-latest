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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('book', 'BookController@book');

Route::get('bookall', 'BookController@bookAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

Route::get('questionnaireall', 'QuestionnairesController@questionnaireAuth')->middleware('jwt.verify');
Route::get('questionall', 'QuestionController@questionAuth')->middleware('jwt.verify');

Route::get('questionbyid', 'QuestionController@questionByIdAuth')->middleware('jwt.verify');

Route::get('questionbyidquestionnaire', 'QuestionController@questionByQuestionnaire')->middleware('jwt.verify');

Route::post('saveAnswer', 'AnswerController@save')->middleware('jwt.verify');
