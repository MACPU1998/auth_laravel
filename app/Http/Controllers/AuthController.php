<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        $user= User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>Hash::make($request->password),
        ]);
        if (!$user){
            return redirect()->back()->with('error','Something went wrong');
        }
        return redirect()->route('home')->with('success','User registered successfully');
    }

    public function login(){
        if(auth()->check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function loginPost(Request $request){
        // $request->validate([
        //     'email' => 'required|email|exists:users',
        //     'password' => 'required|min:5'
        // ]);

        // $user = User::where('email', $request->email)->first();
        // if(!$user) {
        //     return redirect()->back()->with('error', 'User with this email was not found');
        // }

        // if(!Hash::check($request->password, $user->password)){
        //     return redirect()->back()->with('error', 'The password entered is wrong');
        // }

        // Auth::login($user);
        // $request->session()->regenerate();
        // return redirect()->route('home');

        $credentials = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:5'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->route('login')->with('error', 'Login details are not valid');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
