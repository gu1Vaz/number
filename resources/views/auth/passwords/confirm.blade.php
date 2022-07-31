@extends('layouts.layout_auths')

@section('content')
    <div class="d-flex flex-column p-2 w-100">
        <div class="w-100 d-flex flex-column align-items-center justify-content-center mb-5">
        <a href="" class="text-decoration-none "><img  src="imgs/Logo.png"style="width:147px;height:43px;margin-left:30px;"></a>
             <h2 class="m-2">Confirme sua senha</h2>
             <h3 class="m-2">Confirme sua senha para continuar</h3>
        </div>
        <div class=" w-100 d-flex flex-column ">
        <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirme sua senha') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
             </div>
    </div>
@endsection
