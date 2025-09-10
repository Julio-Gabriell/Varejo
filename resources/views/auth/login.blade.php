@extends('layouts.app')

@section('title')
    <title>
        Login - Varejo
    </title>
@endsection

@section('content')
<div>
    <div>
        <img src="{{ asset('Assets/Imagens/Rectangle.png') }}" height="190" width="190" class="" alt="Logo Varejo 2 irmãos"/>   
    </div>
    <div>
    <h3>
        Entre na sua conta!
    </h3>
    </div>
</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

    <label for="email" class="">{{ __('Email') }}</label>
    <div class="">
        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="">
        <label for="password" class="">{{ __('Senha') }}</label>
        <div class="">
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="">
        <div class="">
            <div class="">
                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="" for="remember">
                    {{ __('Lembre de mim') }}
                </label>
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <button type="submit" class="">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua Senha?') }}
                </a>
            @endif
        </div>
        <div class="">
            <a class="" href="{{ route('register') }}">
                {{ __('Ainda não possui uma conta? Cadastre-se!') }}
            </a>
        </div>
    </div>
</form>

<a href="{{ url('/auth/google/redirect') }}">
  <button style="border:1px solid #ccc; border-radius:6px; padding:10px 20px; display:flex; align-items:center; gap:10px;">
    <img src="https://developers.google.com/identity/images/g-logo.png" style="width:20px;height:20px;">
    Conectar com Google
  </button>
</a>


@endsection
