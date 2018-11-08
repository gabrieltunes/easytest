<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestaoDissertativa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'materia_id' => 'required',
            'assunto_id' => 'required',
            'dificuldade' => 'required',
            'enunciado' => 'required|unique:questao_dissertativa,enunciado,materia_id,assunto_id'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'materia_id.required' => 'Selecione a matéria',
            'assunto_id.required' => 'Selecione o assunto',
            'dificuldade.required' => 'Escolha uma dificuldade',
            'enunciado.required' => 'Insera um enunciado',
            'enunciado.unique' => 'Questão já foi cadastrada'
            
        ];
    }
}
