@extends('layouts.app')

@section('title')
    <title>
        Vendas - Varejo
    </title>
@endsection

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Vendas</h1>
        <a href="{{ route('vendas.form') }}"
           class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow-sm transition">
            <i class="fa-solid fa-plus mr-2"></i> Nova venda
        </a>
    </div>
@endsection
