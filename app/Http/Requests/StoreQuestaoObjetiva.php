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
            'correta' => 'required|max:1|alpha'

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
            'enunciado.required' => 'Insira um enunciado',
            'altA.required' => 'Insira uma alternativa A',
            'altB.required' => 'Insira uma alternativa B',
            'altC.required' => 'Insira uma alternativa C',
            'altD.required' => 'Insira uma alternativa D',
            'altE.required' => 'Insira uma alternativa E',
            'correta.required' => 'Insera uma alternativa correta',
            'correta.max' => 'Insera SOMENTE a letra correspondente para alternativa correta',
            'correta.alpha' => 'O campo CORRETA deve conter apenas letras (A, B, C, D ou E)'
            
        ];
    }
}
