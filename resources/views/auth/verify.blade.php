@extends('layouts.layout_auths')

@section('content')
    <div class="d-flex flex-column p-2 w-100">
        <div class="w-100 d-flex flex-column align-items-center justify-content-center mb-5">
        <a href="" class="text-decoration-none "><img  src="imgs/Logo.png"style="width:147px;height:43px;margin-left:30px;"></a>
             <h3 class="m-2">Verifique o seu email</h3>
        </div>
        <div class=" w-100 d-flex flex-column ">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('O email de recuperação foi enviado para voce') }}
                        </div>
                    @endif

                    {{ __('Para continuar, verifique seu email.') }}
                    {{ __(''Caso nao tenha recebido seu link de recuperação:) }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique aqui para receber um novo link') }}</button>.
                    </form>
        </div>
    </div>
@endsection
