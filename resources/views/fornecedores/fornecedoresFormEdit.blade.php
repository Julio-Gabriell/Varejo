@extends('layouts.app')

@section('content')

    <h1>
        Edit Fornecedor
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

    <form action="{{ route('fornecedor.editar', $fornecedor->idfornecedor) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="nomeFornecedor">Nome do fornecedor:</label>
        <input type="text" id="nomeFornecedor" name="nome" value="{{ $fornecedor->nome }}">

        <label for="cnpjFornecedor">Cnpj do fornecedor:</label>
        <input type="number" step="0.01" id="cnpjFornecedor" name="cnpj" value="{{ $fornecedor->CNPJ }}">

        <label for="telefoneFornecedor">Telefone do fornecedor:</label>
        <input type="tel" id="telefoneFornecedor" name="telefone" value="{{ $fornecedor->telefone }}">

        <button type="submit">Cadastrar</button>
    </form>
@endsection
