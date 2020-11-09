<?php

namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use Illuminate\Http\Request;

class QuestionAnswerController extends Controller
{
    public function store(Request $request) {
        $input = $request->all();
        $chat = QuestionAnswer::create($input);

        return redirect('questionnaires/');
    }

}
