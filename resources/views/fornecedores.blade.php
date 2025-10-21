@extends('layouts.app')

@section('content')
    <h1>
        Fonecedores
    </h1>

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
    @endforeach

    <a href="{{ route('home') }}">Home</a>
@endsection
