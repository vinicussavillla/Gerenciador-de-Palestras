<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{User}; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{
    public function create()
    {
        return view('auth.cadastro'); 
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $requestData['user']['role'] = 'participante';

        DB::beginTransaction(); 
        try {
            $user = User::create($requestData['user']);


            $user->endereco()->create($requestData['endereco']);

            foreach ($requestData['telefones'] as $telefone){
                $user->telefones()->create($telefone);
            }

            DB::commit();
            return 'Conta Criada com sucesso!'; 

        } catch (\Exception $exception) {
            DB::Rollback(); 
            return 'Messagem:' .$exception->getMessage();
        }
    }
}
