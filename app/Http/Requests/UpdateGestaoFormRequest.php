<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateGestaoFormRequest extends FormRequest
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
            'titulo'=>'max:80|min:5',
            'descricao'=>'max:200|min:5',
            'data_inicio'=>'date',
            'data_termino'=>'date',
            'valor_projeto'=>'decimal:2',
            'status'=>'max:20|min:5'
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
            'titulo.max' => 'Título deve conter apenas 80 caracteres',
            'titulo.min' => 'Título deve conter no mínimo 5 caracteres',
            'decricao.max' => 'Descrição deve conter apenas 200 caracteres',
            'decricao.min' => 'Descrição deve conter no mínimo 5 caracteres',
            'data_inicio.date' => 'Apenas datas',
            'data_termino.date' => 'Apenas datas',
            'valor_projeto.decimal' => 'Valor do projeto apenas em números decimais',
            'status.max' => 'Título deve conter apenas 20 caracteres',
            'status.min' => 'Título deve conter no mínimo 5 caracteres'
        ];
    }
}

