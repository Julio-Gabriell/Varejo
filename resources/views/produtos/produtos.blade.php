@extends('layouts.app')

@section('title')
    <title>Produtos - Varejo</title>
@endsection

@section('content')
<div class="p-6">

    <!-- Cabeçalho -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Produtos</h1>
        <a href="{{ route('produtos.form') }}"
           class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow-sm transition">
            <i class="fa-solid fa-plus mr-2"></i> Criar produto
        </a>
    </div>

    <!-- Cabeçalho estilo tabela -->
    <div class="hidden md:grid grid-cols-5 gap-4 px-6 py-2 border-b border-gray-300 text-sm font-semibold text-gray-600">
        <div>Código</div>
        <div>Produto</div>
        <div>Preço</div>
        <div>Estoque</div>
        <div class="text-center">Ações</div>
    </div>

    <!-- Lista de produtos -->
    <div class="space-y-3 mt-2">
        @forelse ($produtos as $produto)
            <div class="grid grid-cols-5 gap-4 items-center bg-white px-6 py-3 rounded-lg shadow-sm hover:shadow-md transition border border-gray-200">

                <!-- Código -->
                <div class="text-sm font-medium text-gray-700">{{ $produto->idproduto }}</div>

                <!-- Produto -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('storage/' . $produto->path) }}"
                         alt="{{ $produto->nome }}"
                         class="w-10 h-10 object-cover rounded">
                    <span class="text-gray-800 text-sm font-medium">{{ $produto->nome }}</span>
                </div>

                <!-- Preço -->
                <div class="text-sm text-gray-700">
                    R$ {{ number_format($produto->precokg, 2, ',', '.') }}
                </div>

                <!-- Estoque -->
                <div class="text-sm text-gray-700">{{ $produto->estoque }}Kg</div>

                <!-- Ações -->
                <div class="flex justify-center items-center space-x-4">
                    <!-- Editar -->
                    <a href="{{ route('produtos.formEditar', $produto->idproduto) }}"
                       class="text-gray-500 hover:text-blue-600 transition">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    <!-- Deletar -->
                    <form action="{{ route('produtos.deletar', $produto->idproduto) }}"
                          method="POST"
                          onsubmit="return confirm('Tem certeza que deseja excluir o item {{ $produto->idproduto }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-500 hover:text-red-600 transition">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 py-10">Nenhum produto cadastrado.</p>
        @endforelse
    </div>

</div>
@endsection
