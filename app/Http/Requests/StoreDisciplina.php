<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDisciplina extends FormRequest
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
        $professor_id = auth()->user()->id;
        return [
            //
            'descricao' => 'required|max:200'
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
            'descricao.required' => 'Insira um nome',
            'descricao.max'  => 'Nome de disciplina muito grande',
            'descricao.unique'  => 'Essa disciplina já existe'
        ];
    }
}
