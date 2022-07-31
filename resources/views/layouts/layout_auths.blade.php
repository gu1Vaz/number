<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Number') }}</title>
    <link rel="icon"  href="imgs/icone.png">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/layout_auths.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../node_modules/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <div id="app">

    <div class="divGeral d-flex  flex-column align-items-center justify-content-center">

       <div class="divFormulario d-flex  flex-column border p-5">
               @yield('content')
       </div>
       @guest
       <div class="botoesNav ">
           <div>
            <a style="margin: 4px;" href="{{ url('/register') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">Cadastrar-se</a>
            <a style="margin: 4px;" href="{{ url('/login') }}" class="text-sm font-weight-bold text-gray-700 text-decoration-none">Login</a>
           </div>
           <div>
               <a style="margin: 4px;" href="{{ url('/ajuda') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">Ajuda</a>
               <a style="margin: 4px;" href="{{ url('/feedback') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">FeedBack</a>
           </div>
         </div>
         @endguest
    </div>
    </div>
</body>
</html>
