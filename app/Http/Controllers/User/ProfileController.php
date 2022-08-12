<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);

        return view('user.profile.index',compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $user = User::find($id);


        return view('user.profile.index',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        if ($id == Auth::user()->id){
            return view('user.profile.edit',compact('user'));
        }
        else {
            return "Ухади";
        }

    }

    public function update(Request $request, User $user, $id)
    {
        $input = $request->all();
        $userPassword = Auth::user()->password;

        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'new_password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        $user = User::find($id);
        if ($id == $user->id){
            if (!Hash::check($request->password, $userPassword)) {
                return "Данные введены не верно";
            }
            $user->password = Hash::make($request->new_password);

            $user->save();
            $user->update($request->all());
            return view('user.profile.index',compact('user'));
        }
        else {
        return view('user.profile.index');
        }
    }

    public function destroy($id)
    {
        //
    }
}
