<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('participante.dashboard.index'); 
        }

        return redirect()
            ->route('auth.login.create')
            ->with('warning', 'Email ou senha incorretos!')
            ->withInput();
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('auth.login.create'); 
    }
}
