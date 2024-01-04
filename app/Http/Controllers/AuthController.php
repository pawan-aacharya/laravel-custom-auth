<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // login code
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }

        return redirect('login')->withErrors('error','login detail are not valid.');
    }
    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation'=>'required_with:password|same:password'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //login user here
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }

        return redirect('register')->withErrors('error');
    }
    public function home()
    {
        return view('home');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
