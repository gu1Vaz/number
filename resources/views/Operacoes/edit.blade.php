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
    <link href="{{ asset('css/paginas/home.css') }}" rel="stylesheet">

</head>
<body  style="padding:12px 12px 0 12px;">
    <div class="divGeral">
        <div class="divBoasVindas">
            <div class="boasVindas">
                    <form class="w-100 h-100" enctype="multipart/form-data" method="POST" action="{{route('numero.update',$numero->id)}}" >
                      @csrf
                      @method('PUT')
                            <div class="input-group  d-flex flex-column align-items-center w-100 h-100">
                                <div class="d-flex flex-row w-100 mb-2">
                                   <label class="w-25 text-md-right mr-2" for="nome"> Nome:</label>
                                   <input class="w-75 form-control" value="{{$numero->ref}}"type="text" name="nome" id="nome">
                                </div>
                                <div class="d-flex flex-row w-100 mb-2">
                                   <label class="w-25 text-md-right mr-2" for="pais"> Pais:</label>
                                   <input class="w-75 form-control" value="{{$numero->pais}}" type="number" name="pais" id="pais">
                                </div>
                                <div class="d-flex flex-row w-100 mb-2">
                                   <label  class="w-25 text-md-right mr-2" for="ddd">  DDD:</label>
                                   <input class="w-75 form-control"  value="{{$numero->ddd}}" type="number" name="ddd" id="ddd">
                                </div>
                                <div class="d-flex flex-row w-100 mb-2">
                                   <label class="w-25 text-md-right mr-2 " for="numero"> Numero:</label>
                                   <input  class="w-75 form-control" value="{{$numero->numero}}" type="number" name="numero" id="numero">
                                </div>
                                <div class="d-flex flex-row w-100 mb-2">
                                   <label class="w-25 text-md-right mr-2 " for="image_url"> Image:</label>
                                   <img class=" img-thumbnail rounded-circle"  src={{asset(Storage::url($numero->image_url))}} ></img>
                                   <input class="w-50 form-control"  type="file" name="image" id="image">
                                </div>
                                <div  class="d-flex flex-row w-100 mb-2">
                                    <label class="w-25 text-md-right mr-2 " for="grupo"> Grupo:</label>
                                    <select class="w-75 form-control" name="grupo" id="grupo" class="form-control card bg-white border-0 w-10">
                                        <label class="w-25 text-md-right mr-2 " for="grupo"> Grupo:</label>
                                        @foreach($grupos as $grupo)
                                        <option value="{{$grupo->id}}">{{$grupo->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="d-flex flex-row form-check form-check-inline  w-100">
                                   <label class="w-25 text-md-right mr-2 ml-3 " for="tipo"> Tipo do contato:</label>
                                    <div class="w-75 ml-2" >
                                        <input class="form-check-input" type="radio" name="tipo" id="tipo" value="comercial">
                                        <label for="tipo">Comercio/Empresa</label>
                                        <input class="form-check-input" type="radio" name="tipo" id="tipo" value="personal">
                                        <label  for="tipo">Pessoa</label>
                                    </div>
                                                                </div >
                                <button type="submit" class="btn card bg-primary  mt-2 text-light border-0 w-5 d-flex flex-row align-items-center justify-content-center">Enviar</button>
                            </div>
                    </form>
             </div>

        </div>

    </div>
</body>
</html>
