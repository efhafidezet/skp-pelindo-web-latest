<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function show() {
        $listGroup = Group::all()->sortBy("order")->where('is_active', "1");
        return view('pages.groups.list', compact('listGroup'));
    }

    public function store(Request $request) {
        $input = $request->all();
        $chat = Group::create($input);

        return redirect('groups/');
    }

    public function update(Request $request) {
        $detailQuestion = Group::where('group_id', $request->input('group_id'))->firstOrFail();
        $detailQuestion->update($request->all());
        return redirect('groups/');
    }
}
