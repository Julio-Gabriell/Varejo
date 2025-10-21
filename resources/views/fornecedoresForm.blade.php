@extends('layouts.app')

@section('content')

    <h1>
        Novo Fornecedor
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

    <form action="{{ route('fornecedor.criar') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <label for="nomeFornecedor">Nome do fornecedor:</label>
        <input type="text" id="nomeFornecedor" name="nome">

        <label for="cnjpFornecedor">Cnpj do fornecedor:</label>
        <input type="number" step="0.01" id="cnpjFornecedor" name="cnpj">

        <label for="telefoneFornecedor">Telefone do fornecedor:</label>
        <input type="tel" id="telefoneFornecedor" name="telefone">

        <button type="submit">Cadastrar</button>
    </form>
@endsection
