@extends('layouts.layout_auths')

@section('content')
    <div class="d-flex flex-column p-2 w-100">
        <div class="w-100 d-flex flex-column align-items-center justify-content-center mb-5">
        <a href="2" class="text-decoration-none "><img src="{{ URL::to('/') }}/imgs/Logo.png" style="width:147px;height:43px;margin-left:30px;"></a>
             <h2 class="m-2">Recuperaçao de senha</h2>
             <h4 class="m-2">Digite o email da sua conta </h4>

        </div>
        <div class=" w-100 d-flex flex-column ">
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Seu Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 w-25">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar Senha de Recuperação') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
@endsection
