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
        <a href="{{ route('fornecedor.formEditar', $fornecedor->idfornecedor) }}"><i class="fa-solid fa-pen"></i></a>            
            <form action=" {{ route('fornecedor.deletar', $fornecedor->idfornecedor) }} " method="POST"
                onsubmit="return confirm('Tem certeza que deseja excluir o item {{ $fornecedor->idfornecedor }}?')">
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
