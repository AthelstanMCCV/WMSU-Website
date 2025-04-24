<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        Auth::login($user);

        return redirect('/dashboard');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'loginname' => 'required|string',
            'loginpassword' => 'required|string',
        ]);

        if (Auth::attempt(['name' => $validated['loginname'], 'password' => $validated['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'loginname' => 'The provided credentials do not match our records.',
        ]);
    }
}
