@extends('layouts.app')

@section('title')
    <title>
        Fornecedores - Varejo
    </title>
@endsection

@section('content')
<div class="p-6">
    <a href="{{ Route('home') }}"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Fornecedores</h1>
        <a href="{{ route('fornecedor.form') }}"
           class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow-sm transition">
            <i class="fa-solid fa-plus mr-2"></i> Criar Fornecedor
        </a>
    </div>

    <div class="grid grid-cols-4 font-semibold text-gray-600 text-sm px-4 py-2 my-2 border-b border-gray-300">
        <div>Nome fornecedor</div>
        <div>CNPJ/CPF</div>
        <div>Telefone</div>
        <div class="text-center">Ações</div>
    </div>

    @foreach ($fornecedores as $fornecedor)
        <div class="bg-white rounded-xl p-4 shadow-sm mb-3 grid grid-cols-4 items-center text-sm">

            <div class="text-gray-800">
                {{ $fornecedor->nome }}
            </div>

            <div class="text-gray-800">
                {{ $fornecedor->CNPJ }}
            </div>

            <div class="text-gray-800">
                {{ $fornecedor->telefone }}
            </div>

            <div class="flex items-center justify-center gap-4">

                <a href="{{ route('fornecedor.formEditar', $fornecedor->idfornecedor) }}"
                   class="text-gray-700 hover:text-blue-600 text-lg transition">
                    <i class="fa-solid fa-pen"></i>
                </a>

                <form action="{{ route('fornecedor.deletar', $fornecedor->idfornecedor) }}" method="POST"
                      onsubmit="return confirm('Tem certeza que deseja excluir este item?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-700 hover:text-red-600 text-lg transition">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>

        </div>
    @endforeach
</div>
@endsection
