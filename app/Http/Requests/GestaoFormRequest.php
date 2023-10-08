<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GestaoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'titulo'=>'required|max:80|min:5',
           'descricao'=>'required|max:200|min:5',
           'data_inicio'=>'required|date',
           'data_termino'=>'required|date',
           'valor_projeto'=>'required|decimal:2',
           'status'=>'required|max:20|min:5'

        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){
        return[
            'titulo.required' => 'Título obrigatório',
            'titulo.max' => 'Título deve conter apenas 80 caracteres',
            'titulo.min' => 'Título deve conter no mínimo 5 caracteres',
            'descricao.required' => 'Descrição obrigatória',
            'decricao.max' => 'Descrição deve conter apenas 200 caracteres',
            'decricao.min' => 'Descrição deve conter no mínimo 5 caracteres',
            'data_inicio.required' => 'Data inicial obrigatória',
            'data_inicio.date' => 'Apenas datas',
            'data_termino.required' => 'Data de finalização obrigatória',
            'data_termino.date' => 'Apenas datas',
            'valor_projeto.required' => 'Valor do projeto obrigatório',
            'valor_projeto.decimal' => 'Valor do projeto apenas em números decimais',
            'status.required' => 'Status do projeto obrigatório',
            'status.max' => 'Título deve conter apenas 20 caracteres',
            'status.min' => 'Título deve conter no mínimo 5 caracteres'
        ];
    }
}