<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paginas/sobre.css') }}" rel="stylesheet">

</head>
<body  style="padding:12px 12px 0 12px;">
    <div class="divGeral">
        <div class="logo">
                <a href="" class="text-decoration-none "><img  src="{{ URL::to('/') }}/imgs/Logo.png"  style="width:147px;height:43px;margin-left:30px;" ></a>
         </div>
        <h2>Quem somos?</h2>
        <div class="Grupo">
            <div class="Item">
                <img src="{{ URL::to('/') }}/imgs/ana.png"alt="">
                 <div class="Texto">
                         <h5>Ana Flávia Agostinho Reside em Elói Mendes - MG e Graduada em Ciência da Computação pela UFMG</h5>
                 </div>
            </div>
            <div class="Item">
                <img src="{{ URL::to('/') }}/imgs/eu.png"alt="">
                 <div class="Texto">
                         <h5>Guilherme Vaz Reside em Três Pontas - MG e Graduado em Segurança da Informação pela UNIVAS</h5>
                 </div>
            </div>
        </div>
        <div class="Grupo">
        <div class="Item">
                <img src="{{ URL::to('/') }}/imgs/juan.png"alt="">
                 <div class="Texto">
                         <h5>Juan Carlo Rabelo Reside em Varginha - MG Graduado em Engenharia de Computação pela UnB</h5>
                 </div>
            </div>
            <div class="Item">
                <img src="{{ URL::to('/') }}/imgs/fael.png"alt="">
                 <div class="Texto">
                         <h5>Rafael Almeida Reside em Carmo da Cachoeira - MG Graduado em Análise e Desenvolvimento de Sistemas pela UFSJ</h5>
                 </div>
            </div>
        </div>
    </divGeral>
</body>
</html>
