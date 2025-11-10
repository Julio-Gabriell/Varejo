@extends('layouts.app')

@section('title')
    <title>
        Cadastro produto - Varejo
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

    <form action="{{ route('produtos.criar') }}" method="post" enctype="multipart/form-data">
       @csrf

       <label for="imgProduto">Imagem do produto:</label>
       <input type="file" id="imgProduto" name="path">

       <label for="estoqueProduto">Valor de produtos em estoque:</label>
       <input type="number" step="1" id="estoqueProduto" name="estoque">
       
       <label for="nomeProduto">Nome do produto:</label>
       <input type="text" id="nomeProduto" name="nome">

       <label for="valorCompra">Valor de compra do produto:</label>
       <input type="number" step="0.01" id="valorCompra" name="valorcompra">

       <label for="precoProduto">Preço do Kg do produto:</label>
       <input type="number" step="0.01" id="precoProduto" name="precokg">

       <button type="submit">Cadastrar</button>
    </form>
@endsection
