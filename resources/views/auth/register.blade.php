@extends('layouts.guest')

@section('title')
    <title>
        Cadastro - Varejo
    </title>
@endsection

@section('content')

<div id="register-container" class="w-[full] min-h-[90dvh] m-0 flex items-center justify-center flex-col gap-2 font-inter">
    <div class="flex items-center justify-center flex-col mb-[50px]">
      <div>
          <img src="{{ asset('Assets/Imagens/logoNova.png') }}" height="190" width="190" class="" alt="Logo Varejo 2 irmãos"/>   
      </div>
      <div>
      <h3 class="text-[24px] font-bold text-verde-claro ">
          Entre em sua conta!
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
        <button type="submit" class="">
            {{ __('CADASTRAR') }}
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
    </form>

    <div class="w-[90%] md:w-[60%] lg:w-[50%] xl:w-[35%] h-auto my-1">
      <a class="text-laranja underline decoration-1" href="{{ route('login') }}">
          {{ __('Já possui uma conta? Faça login!') }}
      </a>
    </div>

    <div class="w-[90%] md:w-[60%] lg:w-[50%] xl:w-[35%] flex items-center justify-center relative my-5">
      <hr class="w-full h-[2px]">
      <span class="text-black/50 font-black text-xl bg-white px-2 absolute left-[50%] top-[50%] translate-x-[-50%] translate-y-[-50%] z-30">OU</span>
    </div>

    <div class="w-[90%] md:w-[60%] lg:w-[50%] xl:w-[35%]">
      <a href="{{ url('/auth/google/redirect') }}">
        <button class="btn-google">
          <img src="https://developers.google.com/identity/images/g-logo.png" style="width:20px;height:20px;">
          Conectar com Google
        </button>
      </a>
    </div>  
</div>

@endsection
