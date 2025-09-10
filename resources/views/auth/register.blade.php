@extends('layouts.app')

@section('title')
    <title>
        Cadastro - Varejo
    </title>
@endsection

@section('content')

    <div>
    <div>
        <img src="{{ asset('Assets/Imagens/Rectangle.png') }}" height="190" width="190" class="" alt="Logo Varejo 2 irmãos"/>   
    </div>
    <div>
    <h3>
        Crie a sua conta!
    </h3>
    </div>
</div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="">
            <label for="name" class="">{{ __('Nome de usuário') }}</label>

            <div class="">
                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="email" class="">{{ __('Email') }}</label>

            <div class="">
                <input id="email" type="email" class="@error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="password" class="">{{ __('Senha') }}</label>

            <div class="">
                <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="password-confirm" class="">{{ __('Confirme sua Senha') }}</label>

            <div class="">
                <input id="password-confirm" type="password" class="" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="">
            <div class="">
                <button type="submit" class="">
                    {{ __('Cadastrar') }}
                </button>
            </div>
        </div>
        <div class="">
            <a class="" href="{{ route('login') }}">
                {{ __('Já possui uma conta? Faça login!') }}
            </a>
        </div>
    </form>
    <a href="{{ url('/auth/google/redirect') }}">
  <button style="border:1px solid #ccc; border-radius:6px; padding:10px 20px; display:flex; align-items:center; gap:10px;">
    <img src="https://developers.google.com/identity/images/g-logo.png" style="width:20px;height:20px;">
    Conectar com Google
  </button>
</a>    
@endsection
