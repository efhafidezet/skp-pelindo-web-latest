<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\Group;
use App\Models\QuestionAnswer;
use App\Models\Log;
use Carbon\Carbon;
use Auth;

class QuestionnairesController extends Controller
{
    public function show() {
        $listQuestionnaire = Questionnaire::all()->where('is_active', "1");
        return view('pages.questionnaires.list', compact('listQuestionnaire'));
    }

    public function store(Request $request) {
        $input = $request->all();
        $chat = Questionnaire::create($input);

        return redirect('questionnaires/');
    }

    public function showQuestionnaire($questionnaire_id) {
        $detailQ = Questionnaire::where('questionnaire_id', $questionnaire_id)->firstOrFail();
        $listGroup = Group::all()->sortBy("order");
        $listQuestionAnswer = QuestionAnswer::all();
        $list_0 = Question::all()->where('questionnaire_id', $questionnaire_id)->where('group_id', "0")->where('is_active', "1");
        $list_1 = Question::all()->where('questionnaire_id', $questionnaire_id)->where('is_active', "1");
        return view('pages.questionnaires.questions.list', compact('detailQ','listGroup', 'listQuestionAnswer', 'list_0', 'list_1'));
    }

    public function update(Request $request) {
        $detailQuestion = Questionnaire::where('questionnaire_id', $request->input('questionnaire_id'))->firstOrFail();
        $detailQuestion->update($request->all());
        return redirect('questionnaires/');
    }

    public function questionnaireAuth() {
        if (Auth::user()->role == 2) {
            $data = Questionnaire::all()->where('is_continuous', "1")
            ->where('is_active', "1")
            ->where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now());
        } else {
            $data = Questionnaire::all()
            ->where('is_active', "1")
            ->where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now());
        }
        return response()->json($data, 200);
    }
}
