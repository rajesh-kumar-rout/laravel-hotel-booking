<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:20'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $request->session()->regenerate();
 
        return redirect()->intended(route('home.index'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
 
            return redirect()->intended(route('home.index'));
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }

    public function editAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:30',
            'email' => 'required|email|unique:users,email,' . $request->user()->id
        ]);

        $user = $request->user();

        $user->name = $request->name;

        $user->email = $request->email;

        $user->save();

        return back()->with('success', 'Account updated successfully');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string|current_password',
            'new_password' => 'required|string|min:6|max:20|confirmed' 
        ]);

        $user = $request->user();

        $user->password = Hash::make($request->new_password);
        
        $user->save();

        $request->session()->regenerate();

        return back()->with('success', 'Password changed successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('home.index');
    }
}
