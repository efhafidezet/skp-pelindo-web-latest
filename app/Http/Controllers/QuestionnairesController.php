<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\Group;
use App\Models\QuestionAnswer;

class QuestionnairesController extends Controller
{
    public function show() {
        $listQuestionnaire = Questionnaire::all();
        return view('pages.questionnaires.list', compact('listQuestionnaire'));
    }

    public function store(Request $request) {
        $input = $request->all();
        $chat = Questionnaire::create($input);

        return redirect('questionnaires/');
    }

    public function showQuestionnaire($questionnaire_id) {
        $listGroup = Group::all()->sortBy("order");
        $listQuestionAnswer = QuestionAnswer::all();
        $list_0 = Question::all()->where('questionnaire_id', $questionnaire_id)->where('group_id', "0");
        $list_1 = Question::all()->where('questionnaire_id', $questionnaire_id);
        return view('pages.questionnaires.questions.list', compact('questionnaire_id', 'listGroup', 'listQuestionAnswer', 'list_0', 'list_1'));
    }
}
