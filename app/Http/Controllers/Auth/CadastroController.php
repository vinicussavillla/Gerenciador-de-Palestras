<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{User}; 
use Illuminate\Http\Request;
use App\Http\Requests\Auth\CadastroRequest;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{
    public function create()
    {
        return view('auth.cadastro'); 
    }

    public function store(CadastroRequest $request)
    {
        $requestData = $request->validated();

        $requestData['user']['role'] = 'participante';

        DB::beginTransaction(); 
        try {
            $user = User::create($requestData['user']);


            $user->endereco()->create($requestData['endereco']);

            foreach ($requestData['telefones'] as $telefone){
                $user->telefones()->create($telefone);
            }

            DB::commit();
            return redirect()
                ->route('auth.login.create')
                ->with('success', 'Conta criada com sucesso! Efetue o Login');

        } catch (\Exception $exception) {
            DB::Rollback(); 
            return 'Messagem:' .$exception->getMessage();
        }
    }
}
