<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request) {
        echo $request->input('questionnaire_id');
        $input = $request->all();
        $chat = Question::create($input);

        return redirect('questionnaires/'.$request->input('questionnaire_id'));
    }
}
