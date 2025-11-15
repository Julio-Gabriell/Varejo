@extends('layouts.app')

@section('content')
    <div class="p-6">
    <a href="{{ Route('home') }}"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Performance (Últimos 30 dias)</h1>
    </div>
</div>
@endsection
