@extends('layouts.app')

@section('title')
    <title>
        Produtos - Varejo
    </title>
@endsection

@section('content')
    <h1>
        Produtos Cadastrados
    </h1>

    @foreach ($produtos as $produto)
            <p>
                Códidigo: {{ $produto->idproduto }}
            </p>
            <img src="{{ asset('storage/' . $produto->path) }}" alt="{{ $produto->nome }}">
            <p>
                Nome: {{ $produto->nome }} <br>
            </p>
            <p>
                Preço do Kg: {{ $produto->precokg }} <br>
            </p>
            <p>
                Quantidade em estoque: {{ $produto->estoque }} <br>
            </p>
            <a href="{{ route('produtos.formEditar', $produto->idproduto) }}"><i class="fa-solid fa-pen"></i></a>            
            <form action=" {{ route('produtos.deletar', $produto->idproduto) }} " method="POST"
                onsubmit="return confirm('Tem certeza que deseja excluir o item {{ $produto->idproduto }}?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
            <hr>           
    @endforeach

    <a href="{{ route('home') }}">Home</a>
@endsection
