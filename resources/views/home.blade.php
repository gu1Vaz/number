<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon"  href="imgs/icone.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paginas/home.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../node_modules/font-awesome/css/font-awesome.min.css">

</head>
<body  id="body" style="padding:12px 12px 0 12px;">
    <div class="divGeral">
        @if($errors->any())
           <div class="alert alert-danger">
               <ul>
               @foreach($errors->all() as $error)
                <li>{{$error}}</li>
               @endforeach
               </ul>

           </div>
        @endif
        @if(session()->get('success'))
            <div id="alerta"class="alertaSucesso alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
        <div class="agendaFavoritos ">
        <h4>Meus números favoritos<h4>
        <div class="Coluna d-flex flex-column  justify-content-center align-items-center overflow-auto ">
            <ul class="list-group list-group-flush w-75 ">
                @foreach($favoritos as $item)
                    <li class="divItem list-group-item">
                        <img class="img-thumbnail rounded-circle"  src={{asset(Storage::url($item->image_url))}} ></img>
                        <h6>{{$item->ref}}</h6>
                        <h6>{{$item->numero}}</h6>
                        @if ($item->tipo == "personal")
                        <h6>Pessoa</h6>
                        @else
                        <h6>Empresa</h6>
                        @endif
                        <form method="POST"
                              action="{{route('favorito.destroy',$item['pivot']->id)}}"
                              onsubmit="if( !confirm('Tem certeza?') ){return false;}">
                              @csrf
                              @method('DELETE')
                          <button class="btn btn-danger text-light" type="submit" ><i class="icon fa fa-trash"></i></button>
                        </form>
                        <button id="numero" class="btn btn-secondary" name={{$item->id}}  ><i class="icon fa fa-eye child"></i></button>

                    </li>
                @endforeach
            </ul>
        </div>
        <h4>Meus números enviados<h4>
        <div class="Coluna d-flex flex-column justify-content-center align-items-center  overflow-auto">
            <ul class="list-group list-group-flush w-75 ">
               @foreach($numeros as $item)
                    <li class="divItem list-group-item">
                        <img class="img-thumbnail rounded-circle"  src={{asset(Storage::url($item->image_url))}} ></img>
                        <h6>{{$item->ref}}</h6>
                        <h6>{{$item->numero}}</h6>
                        @if ($item->tipo == "personal")
                        <h6>Pessoa</h6>
                        @else
                        <h6>Empresa</h6>
                        @endif
                        <a class="btn btn-primary" href="{{route('numero.edit',$item->id)}}"><i class="icon fa fa-pencil"></i></a>
                        <form method="POST"

                              action="{{route('numero.destroy',$item->id)}}"
                              onsubmit="if( !confirm('Tem certeza?') ){return false;}">
                              @csrf
                              @method('DELETE')
                          <button class="btn btn btn-danger" type="submit" ><i class="icon  fa fa-trash"></i></button>
                        </form>
                        <button id="numero" class="btn btn-secondary " name={{$item->id}}  ><i class="icon  fa fa-eye child"></i></button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
        <div style="height:90%;border-left:1px solid #bfbfbf;width:1px;"></div>
        <div class="divBoasVindas">
             <div class="d-flex flex-row w-100 justify-content-end ">

                <div class="dropdown">
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
               </div>
            <div class="d-flex flex-row justify-content-center">
            <a style="margin: 4px;" href="{{ url('/') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">Pagina Inicial</a>
            <a style="margin: 4px;" href="{{ url('/ajuda') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">Ajuda</a>
            <a style="margin: 4px;" href="{{ url('/feedback') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">FeedBack</a>
            </div>
            <div class="logo d-flex flex-row justify-content-center pt-1  align-items-center w-100">
                <a href="/" class="text-decoration-none "><img  src="imgs/Logo.png"style="width:147px;height:43px;margin-top:6px;"></a>
            </div>
            <div class="boasVindas">
                    <h3>Bem vindo, {{Auth::user()->name}}!</h3>
                    <h4>Essa é sua tela de numeros favoritos</h4>
             </div>
             <div class="w-25">

             </div>
               <div class="mt-2 d-flex flex-column w-95 justify-content-center">
                            <button class="d-flex flex-row justify-content-between align-items-center btn btn-primary w-100 ml-3 rounded-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Novo Contato <i class="fa fa-plus"></i>
                            </button>
                            <div class="collapse" id="collapseExample">
                                    <form class="w-100 h-100" method="POST" enctype="multipart/form-data"  action="{{route('numero.store')}}" >
                                            @csrf
                                            @method('POST')
                                                    <div class="mt-2 nput-group  d-flex flex-column align-items-center w-100 h-100">
                                                        <div class="d-flex flex-row w-100 mb-2">
                                                        <label class="w-25 text-md-right mr-2" for="nome"> Nome:</label>
                                                        <input class="w-75 form-control"type="text" name="nome" id="nome">
                                                        </div>
                                                        <div class="d-flex flex-row w-100 mb-2">
                                                        <label class="w-25 text-md-right mr-2" for="pais"> Pais:</label>
                                                        <input class="w-75 form-control"  type="number" name="pais" id="pais">
                                                        </div>
                                                        <div class="d-flex flex-row w-100 mb-2">
                                                        <label  class="w-25 text-md-right mr-2" for="ddd">  DDD:</label>
                                                        <input class="w-75 form-control" type="number" name="ddd" id="ddd">
                                                        </div>
                                                        <div class="d-flex flex-row w-100 mb-2">
                                                        <label class="w-25 text-md-right mr-2 " for="telefone"> Numero:</label>
                                                        <input  class="w-75 form-control" type="number" name="telefone" id="telefone">
                                                        </div>
                                                        <div class="d-flex flex-row w-100 mb-2">
                                                        <label class="w-25 text-md-right mr-2 " for="image"> Imagem:</label>
                                                        <input  class="w-75 form-control" type="file" name="image" id="image">
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
                                <a style="background:#009999;" class="mt-1 d-flex flex-row text-light justify-content-between align-items-center btn  w-100 ml-3 rounded-0" href="gerarListaTelefonica">
                                      Gerar minha Lista Telefonica <i class="fa fa-plus"></i>
                                 </a>
                            </div>
    </div>
    <script src="{{ url('/js/app.js') }}"></script>
</body>
</html>
