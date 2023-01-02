<?php

namespace App\Http\Requests\Organizacao\Palestra;

use Illuminate\Foundation\Http\FormRequest;

class PalestraRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'name_palestrante' =>'required', 
            'inicio_data_palestra' => [
                'required',
                'date_format:d/m/Y H:i'
            ],
            'final_data_palestra'=> [
                'required', 
                'date_format:d/m/Y H:i', 
                'after:' . $this->inicio_data_palestra ?? null
            ],
            'limite_participantes' => ['numeric', 'integer', 'min:1'],
            'publico_alvo' => ['required', 'max:150'], 
        ];
    }

    public function atributtes()
    {
        return [
            'name' => 'nome',
            'name_palestrante' => 'palestrante',
            'inicio_data_palestra' => 'data de início',
            'final_data_palestra' => 'data de fim',
            'limite_participantes' => 'limite de participante',
            'publico_alvo' => 'público-alvo',

        ];
    }

    public function messages()
    {
        return [
            'date_format' => 'O campo :attribute não corresponde ao formato 00/00/0000 00:00',
            'final_data_palestra.after' => 'A data final deve ser posterior a data inicial.'
        ];
    }
}
