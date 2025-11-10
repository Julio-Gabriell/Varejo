@extends('layouts.app')

@section('title')
    <title>
        Nova Venda - Varejo
    </title>
@endsection

@section('content')
    <a href="{{ Route('home') }}"><i class="fa-solid fa-arrow-left"></i></a>
    <h1>Nova venda</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @livewire('search-produtos')
    @livewire('adicionar-produtos')
</div>
@endsection
