<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function regindex()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $register = new User();
        $register->fill($request->validated());
        $register->save();

        return redirect()->route('login')->with('sukses', 'Register Berhasil');
    }

    public function logindex()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home.index')->with('sukses','Login Berhasil');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }



}
