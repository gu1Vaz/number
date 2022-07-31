@extends('layouts.layout_auths')

@section('content')
    <div class="d-flex flex-column p-2 w-100">
        <div class="w-100 d-flex flex-column align-items-center justify-content-center mb-5">
        <a href="" class="text-decoration-none "><img  src="imgs/Logo.png"style="width:147px;height:43px;margin-left:30px;"></a>
             <h2 class="m-2">Fazer Login</h2>
             <h3 class="m-2">Use sua conta do Number</h3>
        </div>
        <div class=" w-100 d-flex flex-column ">
        <form class="w-100 h-100" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="d-flex flex-row w-100  justify-content-center">
              <label style="width:70px;"for="email" class="mr-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                    <div class="form-group w-75">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

               </div>
               <div class="d-flex flex-row w-100  justify-content-center">
               <label style="width:70px;" for="password" class="mr-2 col-form-label text-md-right">{{ __('Senha') }}</label>
                    <div class="form-group w-75">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
               </div>
               <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
               <div class="d-flex flex-row w-100  justify-content-center">
                            <div >
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mr-5" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua Senha?') }}
                                    </a>
                                @endif
                                <button type="submit" class="btn btn-primary ml-5">
                                    {{ __('Login') }}
                                </button>
                            </div>
                </div>

        </form>
        </div>

    </div>
@endsection
