@extends('layouts.app')

@section('content')
    <a href="{{ route('fornecedor.criar') }}">Adicionar fornecedor</a>
    <a href="{{ route('fornecedor') }}">fornecedores</a>
    <a href="{{ route('produtos.form') }}">Adicionar produto</a>
    <a href="{{ route('produtos') }}">Produtos</a>
@endsection
