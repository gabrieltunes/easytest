<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestaoObjetiva extends FormRequest
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
            'disciplina_id' => 'required',
            'assunto_id' => 'required',
            'dificuldade' => 'required',
            'enunciado' => 'required',
            'altA' => 'required',
            'altB' => 'required',
            'altC' => 'required',
            'altD' => 'required',
            'altD' => 'required',
            'correta' => 'required|max:1'

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
            'disciplina_id.required' => 'Selecione a disciplina',
            'assunto_id.required' => 'Selecione o assunto',
            'dificuldade.required' => 'Escolha uma dificuldade',
            'enunciado.required' => 'Insera um enunciado',
            'altA.required' => 'Insera uma alternativa A',
            'altB.required' => 'Insera uma alternativa B',
            'altC.required' => 'Insera uma alternativa C',
            'altD.required' => 'Insera uma alternativa D',
            'altE.required' => 'Insera uma alternativa E',
            'correta.required' => 'Insera uma alternativa correta',
            'correta.max' => 'Insera SOMENTE a letra correspondente para alternativa correta',
            
        ];
    }
}
