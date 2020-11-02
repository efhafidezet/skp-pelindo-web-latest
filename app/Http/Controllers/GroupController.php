<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function show() {
        $listGroup = Group::all()->sortBy("order");
        return view('pages.groups.list', compact('listGroup'));
    }

    public function store(Request $request) {
        $input = $request->all();
        $chat = Group::create($input);

        return redirect('groups/');
    }
}
