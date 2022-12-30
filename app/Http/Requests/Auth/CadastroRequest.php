<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Cpf;

class CadastroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => ['required', 'email', 'unique:users,email'],
            'user.cpf' => ['required', new Cpf, 'unique:users,cpf'],
            'user.password' => ['required', 'min:8', 'confirmed'],
            'telefones.0.numero' => ['required', 'min:14'],
            'telefones.1.numero' => ['required', 'min:15'],
            'endereco.cep' => 'required',
            'endereco.uf' => ['required', 'size:2'],
            'endereco.cidade' => 'required',
            'endereco.rua' => 'required',
            'endereco.numero' => ['required', 'numeric', 'integer'],
            'endereco.bairro' => 'required',
            'endereco.complemento' => ['nullable', 'max:25'],
        ];
    }

    public function attributes()
    {
        return [
            'user.name' => 'nome',
            'user.email' => 'email',
            'user.cpf' => 'CPF',
            'user.password' => 'senha',
            'telefones.0.numero' => 'telefone',
            'telefones.1.numero' => 'celular',
            'endereco.cep' => 'cep',
            'endereco.uf' => 'uf',
            'endereco.cidade' => 'cidade',
            'endereco.rua' => 'logradouro',
            'endereco.numero' => 'número',
            'endereco.bairro' => 'bairro',
            'endereco.complemento' => 'complemento',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'user.name.required' => 'O campo :attribute deve ser preenchido!',

        ];
    }
}
