@extends('layouts.app')

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

       <label for="imgProduto">Imagem do produto:</label>
       <input type="file" id="imgProduto" name="img" value="{{ $produto->path }}">

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
