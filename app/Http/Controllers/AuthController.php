<?php

namespace App\Http\Controllers;

use Alert;
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

    public function register()
    {
        return view('auth.register');
    }

    public function register_store(RegisterRequest $request)
    {
        $register = new User();
        $register->fill($request->validated());
        $register->save();

        Alert::success('Success', 'Anda Telah Berhasil Melakukan Register');
        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_store(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Success', 'Anda Telah Berhasil Melakukan Login');
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        Alert::success('Success', 'Anda Telah Berhasil Melakukan Logout');

        return redirect('/login');
    }



}
