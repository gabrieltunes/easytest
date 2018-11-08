<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssunto extends FormRequest
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
            'descricao' =>'required|max:190|unique:assunto,descricao,materia_id',
            'materia_id' =>'required'
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
            'descricao.required' => 'Insira um assunto',
            'descricao.max'  => 'Nome de matéria muito grande',
            'descricao.unique'  => 'Esse assunto já existe nessa matéria',
            'materia_id.required'  => 'Informe a matéria'
        ];
    }
}
