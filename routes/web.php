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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('groups', 'GroupController@show');
Route::post('groups', 'GroupController@store');
Route::post('groups/update', 'GroupController@update');


Route::get('questionnaires', 'QuestionnairesController@show');
Route::post('questionnaires', 'QuestionnairesController@store');
Route::post('questionnaires/update', 'QuestionnairesController@update');

Route::get('questionnaires/{questionnaires_id}', 'QuestionnairesController@showQuestionnaire');

Route::post('question', 'QuestionController@store');
Route::post('question/update', 'QuestionController@update');

Route::get('result', 'LogAttemptController@show');
Route::get('result/{id}', 'LogAttemptController@showDetail');
Route::get('export', 'LogAttemptController@exportExcel');

Route::post('questionAnswer', 'QuestionAnswerController@store');


Route::get('enumerators', 'EnumeratorController@show');
Route::post('enumerators', 'EnumeratorController@store');
Route::post('enumerators/update', 'EnumeratorController@update');
Route::post('enumerators/delete', 'EnumeratorController@delete');


Route::get('respondents', 'RespondentController@show');
Route::post('respondents', 'RespondentController@store');
Route::post('respondents/update', 'RespondentController@update');
Route::post('respondents/delete', 'RespondentController@delete');