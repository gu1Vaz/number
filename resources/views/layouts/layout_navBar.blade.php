<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Number') }}</title>
    <link rel="icon"  href="imgs/icone.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/layout_navBar.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../node_modules/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <div id="loading" class="carregar " >
               <div class="divCarregar divCima" style="background:#33adff;">
               <div  class="logo">
                            <a href="" style="margin-left:80px"class="text-decoration-none "><img  src="{{ URL::to('/') }}/imgs/Logo2.png"  style="width:147px;height:43px;" ></a>
                </div>
               </div>
               <div class="divCarregar divBaixo" >
               <img src="{{ URL::to('/') }}/imgs/loader.gif" alt="">
               </div>

    </div>
    <div style="display:none;" id="app">

    <div class="navbar w-100">
                <div class="logo">
                    <a href="" class="text-decoration-none "><img  src="{{ URL::to('/') }}/imgs/Logo.png"  style="width:147px;height:43px;" ></a>
                    <hr style="width:1px;height:30px;border-left:1px solid;margin:0;margin-right:8px;">
                    <a style="margin: 4px;" href="{{ url('/sobre') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">Sobre</a>
                </div>
                <div class="botoesNav h-100 align-items-center">
                    @guest
                    <a style="margin: 4px;" href="{{ url('/register') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">Cadastrar-se</a>
                    <a style="margin: 4px;" href="{{ url('/login') }}" class="text-sm font-weight-bold text-gray-700 text-decoration-none">Login</a>
                    @else
                    <a style="margin: 4px;" href="{{ url('/home') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">Meus Contatos</a>
                    @endguest

                    <a style="margin: 4px;" href="{{ url('/ajuda') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">Ajuda</a>
                    <a style="margin: 4px;" href="{{ url('/feedback') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">FeedBack</a>

                    @guest
                    @else
                    <div class="dropdown ml-2">
                        <button style="background:#0099ff"class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ url('/meuPerfil') }}">{{ __('Meu Perfil') }}</a>
                            <a class="dropdown-item " href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
    <div class="Nav">
            @if (Route::getCurrentRoute()->getName()=='busca.store')
            <h3>Seus numeros em uma busca, <sNb1>N</sNb1><sNb2>u</sNb2><sNb1>m</sNb1><sNb2>b</sNb2><sNb1>e</sNb1><sNb2>r</sNb2></h3>

            @elseif (Route::getCurrentRoute()->getName()=='ajuda.index')
            <h3><sNb1>N</sNb1><sNb2>u</sNb2><sNb1>m</sNb1><sNb2>b</sNb2><sNb1>e</sNb1><sNb2>r</sNb2> não o ajudou a encontrar  o contato que precisa?</h3>

            @else
            <h3><sNb1>N</sNb1><sNb2>u</sNb2><sNb1>m</sNb1><sNb2>b</sNb2><sNb1>e</sNb1><sNb2>r</sNb2>, ache o numero que procura agora</h3>

            @endif
           @if(Route::getCurrentRoute()->getName()!='ajuda.index')
            <form class="w-85" method="POST" action="{{route('busca.update','-')}}" >
                      @csrf
                      @method('PUT')
                <div class="form-group d-flex flex-row p-3 w-100 barraBusca">
                    <div class="input-group shadow-sm d-flex flex-row align-items-center">
                        <input name="busca" id="busca" type="text" class="form-control card bg-white w-85 border-0"   placeholder="Digite aqui sua busca..." required value="{{old('busca')}}">
                        <button type="submit" class="btn card bg-white border-0 w-5 d-flex flex-row align-items-center justify-content-center"><i class="fa fa-search"></i></button>
                    </div>
                </div>
             </form>
             @endif
    </div>
            @yield('content')
    </div>
    <script src="{{ url('/js/app.js') }}"></script>
</body>
</html>
