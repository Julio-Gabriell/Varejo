<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
            'nome' => 'required|string|max:100|min:3',
            'cnpj' => 'required|numeric|digits:14',
            'telefone' => 'required|numeric|digits:11'
        ];
    } 

    public function messages(): array{
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve conter letras.',
            'nome.max' => 'O nome deve ter menos de 100 caracteres.',
            'nome.min' => 'O nome deve conter pelo menos 3 caracteres.',
            'cnpj.required' => 'O Cnpj é obrigatório',
            'cnpj.numeric' => 'O Cnpj não pode conter letras',
            'cnpj.digits' => 'O Cnpj precisa ter 14 caracteres',
            'telefone.required' => 'O telefone é obrigatório',
            'telefone.numeric' => 'O telefone não pode conter letras',
            'telefone.digits' => 'O telefone precisa ter 11 caracteres',
        ];
    }
}
