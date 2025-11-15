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
        <h1 class="text-2xl font-bold text-gray-800">Produtos</h1>
        <a href="{{ route('produtos.form') }}"
           class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow-sm transition">
            <i class="fa-solid fa-plus mr-2"></i> Criar produto
        </a>
    </div>

    @foreach ($fornecedores as $fornecedor)
        <p>
            Nome: {{ $fornecedor->nome }}
        </p>
        <p>
            Cnpj: {{ $fornecedor->CNPJ }}
        </p>
        <p>
            Telefone: {{ $fornecedor->telefone }}
        </p>
        <a href="{{ route('fornecedor.formEditar', $fornecedor->idfornecedor) }}"><i class="fa-solid fa-pen"></i></a>            
            <form action=" {{ route('fornecedor.deletar', $fornecedor->idfornecedor) }} " method="POST"
                onsubmit="return confirm('Tem certeza que deseja excluir o item {{ $fornecedor->idfornecedor }}?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
            <hr>  
    @endforeach
</div>
@endsection
