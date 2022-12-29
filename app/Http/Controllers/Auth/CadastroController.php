<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; 
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function create()
    {
        return view('auth.cadastro'); 
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['role'] = 'participante';

        User::create($requestData); 
    }
}
