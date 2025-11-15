@extends('layouts.app')

@section('title')
    <title>Cadastro produto - Varejo</title>
@endsection

@section('content')
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Produtos</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produtos.criar') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Imagem do produto -->
            <div class="flex flex-col">
                <label for="imgProduto" class="text-sm font-medium text-gray-700 mb-2">
                    Imagem do produto (opcional)
                </label>

                <div class="w-100 h-60 bg-orange-100 border border-orange-200 rounded-xl flex items-center justify-center mb-3">
                    <img src="{{ Asset('Assets/Imagens/Vector.svg') }}" alt="">
                </div>

                <label
                    for="imgProduto"
                    class="cursor-pointer bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-6 rounded-lg shadow transition w-100">
                    Inserir imagem
                </label>
                <input type="file" id="imgProduto" name="path" class="hidden">
            </div>

            <!-- Nome do produto -->
            <div>
                <label for="nomeProduto" class="block text-sm font-medium text-gray-700 mb-1">
                    Nome do produto
                </label>
                <input type="text" id="nomeProduto" name="nome"
                    class="w-full border border-orange-200 rounded-lg p-2.5 focus:ring-2 focus:ring-orange-400 focus:outline-none">
            </div>

            <!-- Valor de compra -->
            <div>
                <label for="valorCompra" class="block text-sm font-medium text-gray-700 mb-1">
                    Valor de compra do produto
                </label>
                <div class="relative">
                    <span class="absolute left-3 top-2.5 text-gray-500">R$</span>
                    <input type="number" step="0.01" id="valorCompra" name="valorcompra"
                        class="w-full border border-orange-200 rounded-lg p-2.5 pl-8 focus:ring-2 focus:ring-orange-400 focus:outline-none">
                </div>
            </div>

            <!-- Preço/kg -->
            <div>
                <label for="precoProduto" class="block text-sm font-medium text-gray-700 mb-1">
                    Preço/kg
                </label>
                <div class="relative">
                    <span class="absolute left-3 top-2.5 text-gray-500">R$</span>
                    <input type="number" step="0.01" id="precoProduto" name="precokg"
                        class="w-full border border-orange-200 rounded-lg p-2.5 pl-8 focus:ring-2 focus:ring-orange-400 focus:outline-none">
                </div>
            </div>

            <!-- Quantidade em estoque -->
            <div>
                <label for="estoqueProduto" class="block text-sm font-medium text-gray-700 mb-1">
                    Quantidade em estoque (em KG)
                </label>
                <div class="relative">
                    <input type="number" step="1" id="estoqueProduto" name="estoque"
                        class="w-full border border-orange-200 rounded-lg p-2.5 pr-10 focus:ring-2 focus:ring-orange-400 focus:outline-none">
                    <span class="absolute right-3 top-2.5 text-gray-500">kg</span>
                </div>
            </div>

            <!-- Botões -->
            <div class="flex justify-center gap-4 pt-4">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-8 rounded-lg shadow transition">
                    Salvar
                </button>

                <a href="{{ route('produtos') }}"
                    class="bg-orange-100 hover:bg-orange-200 text-orange-700 font-semibold py-2 px-8 rounded-lg shadow transition">
                    Cancelar
                </a>
            </div>
        </form>
@endsection