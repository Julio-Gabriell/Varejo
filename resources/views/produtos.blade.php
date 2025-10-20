@extends('layouts.app')

@section('content')
    <h1>
        Produtos Cadastrados
    </h1>

    @foreach ($produtos as $produto)
            <p>
                Nome: {{ $produto->nome }} <br>
            </p>
            <p>
                Valor de Compra: {{ $produto->valorcompra }} <br>
            </p>
            <p>
                Preço do Kg: {{ $produto->precokg }} <br>
            </p>
    @endforeach

    <a href="{{ route('home') }}">Home</a>
@endsection
