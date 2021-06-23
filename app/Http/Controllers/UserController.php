<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){
        return view('user.show', compact('user'));
    }

    public function edit(User $user){
        if(\Auth::id() === $user->id){
            return view('user.edit', compact('user'));
        } else {
            return view('errors.403');
        }
    }

    public function update(Request $request, User $user){
        $validated = $request->validate([
            'username' => 'required|unique:users|max:25',
            'name' => 'required',
            'email' => 'email',
            'profile_pick' => 'required'
        ]);
        dd($validated);
        $user->update([

        ]);
    }
}
