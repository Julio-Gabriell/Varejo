@extends('layouts.app')

@section('title')
    <title>
        Edição produto - Varejo
    </title>
@endsection

@section('content')
    <h1>
        Novo produto
    </h1>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('produtos.editar', $produto->idproduto) }}" method="post" enctype="multipart/form-data">
       @csrf
       @method('PUT')

        <div class="mb-4">
            <label class="font-semibold text-gray-700">Imagem do produto</label>

            <div class="w-52 h-52 border border-orange-300 rounded-lg overflow-hidden bg-white mt-2 flex items-center justify-center">
                <img id="previewImagem"
                    src="{{ asset('storage/' . $produto->path) }}"
                    alt="Imagem atual"
                    class="object-cover w-full h-full">
            </div>

            <div class="flex gap-3 mt-3">
                <label for="imgProduto"
                    class="cursor-pointer bg-orange-500 hover:bg-orange-600 text-white text-sm px-4 py-2 rounded-md inline-flex items-center gap-2">
                    <i class="fa-solid fa-upload"></i> Alterar
                </label>

                <button type="button"
                    id="btnRemoverImagem"
                    class="border border-orange-400 text-orange-600 hover:bg-orange-50 text-sm px-4 py-2 rounded-md inline-flex items-center gap-2">
                    <i class="fa-solid fa-trash"></i> Remover
                </button>
            </div>

            <input type="file" id="imgProduto" name="img" class="hidden" accept="image/*">
            <input type="hidden" name="remover_imagem" id="removerImagemInput" value="0">
        </div>

       <label for="estoqueProduto">Valor de produtos em estoque:</label>
       <input type="number" step="1" id="estoqueProduto" name="estoque" value="{{ $produto->estoque }}">
       
       <label for="nomeProduto">Nome do produto:</label>
       <input type="text" id="nomeProduto" name="nome" value="{{ $produto->nome }}">

       <label for="valorCompra">Valor de compra do produto:</label>
       <input type="number" step="0.01" id="valorCompra" name="valorcompra" value="{{ $produto->valorcompra }}">

       <label for="precoProduto">Preço do Kg do produto:</label>
       <input type="number" step="0.01" id="precoProduto" name="precokg" value="{{ $produto->precokg }}">

       <button type="submit">Editar</button>
    </form>
@endsection
