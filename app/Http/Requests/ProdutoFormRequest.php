<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdutoFormRequest extends FormRequest
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

            'nome' => 'required|max:120|min:5 ',
            'preco' => 'required|decimal:18,2',
            'ingredientes' => 'required|max:255|min:30',
            'imagem' => 'required'
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'nome.required' => "O campo nome é obrigatorio",
            'nome.max' => 'O campo nome deve conter no máximo 120 caracteres',
            'nome.min' => 'O campo nome deve conter no minimo 30 caracteres',


            'preco.required' => 'Email obrigatorio',
            'preco.decimal' => 'O campo aceito é em formato decimal',

            'ingredientes.required' => 'Ingredientes obrigatório',
            'ingredientes.max' => 'O campo ingredientes deve conter no máximo 255 caracteres',
            'ingredientes.min' => 'O campo ingredientes deve conter no mínimo 30 caracteres',
          
            'imagem.required' => 'Imagem obrigatoria'
        ];
    }
}
