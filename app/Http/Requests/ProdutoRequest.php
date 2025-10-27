<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'path' => 'image|mimes:jpeg,png,jpg|max:2048',
            'estoque' => 'required|integer',
            'nome' => 'required|string|max:100|min:3',
            'valorcompra' => 'required|numeric',
            'precokg' => 'required|numeric'
        ];
    }

    public function messages(): array{
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve conter letras.',
            'nome.max' => 'O nome deve ter menos de 100 caracteres.',
            'nome.min' => 'O nome deve conter pelo menos 3 caracteres.',
            'valorcompra.required' => 'O valor de compra é obrigatório.',
            'valorcompra.numeric' => 'O valor de compra deve estar no formato "00.00".',
            'precokg.required' => 'O preço do quilo é obrigatório.',
            'precokg.numeric' => 'O valor de compra deve estar no formato "00.00".',
            'path.image' => 'O arquivo não é uma imagem.',
            'path.mimes' => 'O arquivo deve ser: jpeg,png,jpg.',
            'path.max' => 'A imagem deve ser menor.',
            'estoque.required' => 'O numero de produtos em estoque é obrigatório',
            'estoque.int' => 'O campo de estoque deve ser um numero'
        ];
    }
}
