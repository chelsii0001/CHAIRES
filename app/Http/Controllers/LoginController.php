<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'password' => 'required',
        ]);

        $credentials = request()->only('user', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->activo == 0){
                Auth::logout();
                return redirect()->route('/')->with('error', 'El usuario y/o ha sido desactivado.');

            }

                return redirect()->route('index');



        }
        else {

            return redirect()->route('/')->with('error', 'El usuario y/o la contraseña son incorrectas.');
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();
        return redirect()->route('/');

    }
}
