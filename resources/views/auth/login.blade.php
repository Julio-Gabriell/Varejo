@extends('layouts.app')

@section('title')
    <title>
        Login - Varejo
    </title>
@endsection

@section('content')
<div id="login-container" class="w-[full] min-h-[90dvh] m-0 flex items-center  flex-col gap-2 font-inter">
  <div class="flex items-center justify-center flex-col mb-[50px]">
    <div>
        <img src="{{ asset('Assets/Imagens/Rectangle.png') }}" height="190" width="190" class="" alt="Logo Varejo 2 irmãos"/>   
    </div>
    <div>
    <h3 class="text-[24px] font-bold text-verde-claro ">
        Entre em sua conta!
    </h3>
    </div>
</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

    <div class="">
      <label for="email" class="">{{ __('Email') }}</label>
      <div>
        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="self-start">
      <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

      <label class="" for="remember">
          {{ __('Lembre de mim') }}
      </label>
    </div>

    <div class="">
        <button type="submit" class="">
            {{ __('ENTRAR') }}
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
  </form>

  <div class="w-[90%] md:w-[60%] lg:w-[50%] xl:w-[35%] h-auto my-2.5">
    <div class="flex flex-col gap-2">
      @if (Route::has('password.request'))
            <a class="text-verde-escuro underline decoration-solid" href="{{ route('password.request') }}">
                {{ __('Esqueceu sua Senha?') }}
            </a>
        @endif
        <a class="text-laranja underline decoration-solid" href="{{ route('register') }}">
            {{ __('Ainda não possui uma conta? Cadastre-se!') }}
        </a>
    </div>
  </div>

  <div class="w-[90%] md:w-[60%] lg:w-[50%] xl:w-[35%] flex items-center justify-center relative my-5">
    <hr class="w-full h-[2px]">
    <span class="text-black/50 font-black text-xl bg-white px-2 absolute left-[50%] top-[50%] translate-x-[-50%] translate-y-[-50%] z-30">OU</span>
  </div>

  <div class="w-[90%] md:w-[60%] lg:w-[50%] xl:w-[35%]">
    <a href="{{ url('/auth/google/redirect') }}">
      <button class="w-full h-[40px] flex items-center justify-center gap-2 border-1 border-black rounded-[10px] shadow-md hover:bg-gray-100 duration-200 hover:cursor-pointer">
        <img src="https://developers.google.com/identity/images/g-logo.png" style="width:20px;height:20px;">
        Conectar com Google
      </button>
    </a>
  </div>



</div>


@endsection
