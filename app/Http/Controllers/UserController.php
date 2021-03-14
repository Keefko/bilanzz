<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        return view('dashboard.admin')->with('users', User::all());
    }


    public function store(Request $request)
    {

        $request->validate([
            'login' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User();

        $user->name = $request->input('login');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->back()->with('success', 'Užívateľ úspešne pridaný');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'login' => 'required',
            'email' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('login');
        $user->email = $request->input('email');
        if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect()->back()->with('success', 'Uzívateľ úspešne upravený');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Užívateľ bol zmazaný');
    }
}
