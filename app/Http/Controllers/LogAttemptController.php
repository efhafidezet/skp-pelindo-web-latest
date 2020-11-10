<?php

namespace App\Http\Controllers;

use App\Models\LogAttempt;
use App\Models\User;
use Illuminate\Http\Request;

class LogAttemptController extends Controller
{
    public function show() {
        $listResult = LogAttempt::all();
        $listUser = User::all();
        // return view('pages.results.list', compact('listResult', 'listUser'));
        return $listUser[0]->id;
    }
}
