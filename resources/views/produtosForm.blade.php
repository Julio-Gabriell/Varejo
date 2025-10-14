@extends('layouts.app')

@section('content')
    <h1>
        Novo produto
    </h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('produtos.criar') }}" method="post" enctype="multipart/form-data">
       @csrf
       
       <label for="nomeProduto">Nome do produto:</label>
       <input type="text" id="nomeProduto" name="nome">

       <label for="valorCompra">Valor de compra do produto:</label>
       <input type="number" step="0.01" id="valorCompra" name="valorcompra">

       <label for="precoProduto">Preço do Kg do produto:</label>
       <input type="number" step="0.01" id="precoProduto" name="precokg">

       <button type="submit">Cadastrar</button>
    </form>
@endsection
