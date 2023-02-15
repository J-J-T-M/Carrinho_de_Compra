<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8' , 'max:102']
        ]);
        if (Auth::attempt($credentials))
            {
                // gerar um novo id para sessão
                $request->session()->regenerate();

                // intended verifica se o user feio de algum lugar
                return redirect()->intended('/admin/dashboard');
            }
        else
        {
            return redirect()->back()->with('erro', 'Email ou senha inválida.');
        }
    }
}
