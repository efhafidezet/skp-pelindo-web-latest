<?php

namespace App\Http\Controllers;

use App\Models\Enumerator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EnumeratorController extends Controller
{
    public function show() {
        $listEnumerator = User::all()->where('role', "2");
        return view('pages.users.enumerators.list', compact('listEnumerator'));
    }

    public function store(Request $request) {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
            'details' => $request->get('details'),
            'is_active' => $request->get('is_active'),
        ]);

        return redirect('enumerators/');
    }

    public function update(Request $request) {
        $data = Enumerator::where('id', $request->input('id'))->firstOrFail();
        $data->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
            'details' => $request->get('details'),
            'is_active' => $request->get('is_active'),
        ]);

        return redirect('enumerators/');
    }
}
