<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'endereco' => 'required|max:200|min:12',
            'telefone' => 'required|max:11|min:11',
            'email'=>'required|max:200|min:15|unique:clientes,email|email:rfc,dns,',
            'cpf'=>'required|max:11|min:11|unique:clientes,cpf',
            'password'=> 'required|max:50|min:8',
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
            'nome.min' => 'O campo nome deve conter no minimo 5 caracteres',

            'endereco'=> 'O campo endereço é obrigatório',
            'endereco'=> 'O máximo de caracteres é 200',
            'endereco'=> 'O mínimo de caracteres é 12',

            'email.required' => 'Email obrigatorio',
            'email.max' => 'O máximo de caracteres é 200',
            'email.min'=> 'O mínimo de caracteres é 15',
            'email.email' => 'Formato de email invalido',
            'email.unique' => 'E-mail já cadastrado',

            'cpf.required' => 'CPF obrigatório',
            'cpf.max' => 'CPF deve conter no máximo 11 caracteres',
            'cpf.min' => 'CPF deve conter no mínimo 11 caracteres',
            'cpf.unique' => 'CPF Já cadastrado no sistema',
            
            'password'=> 'O campo Password é obrigatório',
            'passowrd' => 'O máximo de caracteres é 50',
            'password' => 'O mínimo de caracteres é 8',
          
            'imagem.required' => 'Imagem obrigatoria'
        ];
    }
}
