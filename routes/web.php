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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('groups', 'GroupController@show');
Route::post('groups', 'GroupController@store');


Route::get('questionnaires', 'QuestionnairesController@show');
Route::post('questionnaires', 'QuestionnairesController@store');

Route::get('questionnaires/{questionnaires_id}', 'QuestionnairesController@showQuestionnaire');


Route::post('question', 'QuestionController@store');