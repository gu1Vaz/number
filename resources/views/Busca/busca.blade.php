@extends('layouts.layout_navBar')
@section('content')
    <head>
    <link href="{{ asset('css/paginas/busca.css') }}" rel="stylesheet">
    </head>
    <body id="body" style="padding:12px 12px 0 12px;" >
    <div class="divGeral">
    <div class="d-flex flex-row w-100 p-2">
         <h6>Resultados da busca:</h6>
      </div>
      <div style="margin-top:1px;margin-bottom:5px;margin-left:6px;border-top:1px solid #F2F3F2;width:100%"></div>
      <div class="accordion w-100" id="filtro">
        <div>
            <div class="filtroView rounded-0 w-25" id="headingTwo">
                <h6 class="mb-0">
                <button class="colapsed btn d-flex flex-row align-items-center" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <img style="width:26px;height:26px;margin-right:6px;" src="{{ URL::to('/') }}/imgs/options.png" alt=""></img>
                    <h6>Filtro</h6>
                </button>
                </h6>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#filtro">
                <div class="filtroOpcoes rounded-0 card-body pl-5">
                     <div >
                     <form class="d-flex flex-row justify-content-start "  method="POST" action="{{route('busca.update',$busca)}}" >
                                @csrf
                                @method('PUT')
                         <div class="d-flex flex-column mr-5">
                            <h6 >Grupo</h6>
                            <div style="margin-top:3px;margin-bottom:5px;border-top:1px solid #737373;width:100%;"></div>
                                <div class="d-flex flex-column form-check form-check-inline"  method="POST" action="{{route('busca.store')}}" >
                                <div><input class="form-check-input" type="radio" name="grupo" id="grupo" value="1"><span>Medicos</span></div>
                                    <div><input class="form-check-input" type="radio" name="grupo" id="grupo" value="2"><span>Cefet</span></div>
                                    <div><input class="form-check-input" type="radio" name="grupo" id="grupo" value="3"><span>Progamadores</span></div>
                                    <div><input class="form-check-input" type="radio" name="grupo" id="grupo" value="4"><span>Segurança</span></div>
                                    <div><input class="form-check-input" type="radio" name="grupo" id="grupo" value="5"><span>Padarias</span></div>
                                </div>
                         </div>
                         <div class="d-flex flex-column mr-5">
                            <h6>Tipo</h6>
                            <div style="margin-top:3px;margin-bottom:5px;border-top:1px solid #737373;width:100%;"></div>
                                <div class="d-flex flex-column form-check form-check-inline"  method="POST" action="{{route('busca.store')}}" >
                                    <div><input class="form-check-input" type="radio" name="tipo" id="tipo" value="personal"><span>Pessoas</span></div>
                                    <div><input class="form-check-input" type="radio" name="tipo" id="tipo" value="comercial"><span>Empresas</span></div>
                                </div>

                         </div>
                          <button type="submit" class="h-25 btn card bg-primary border-0 w-15 text-light">Aplicar mudanças</button>
                       </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column w-100 justify-content-center align-items-center">
        <ul class="list-group list-group-flush w-75">
        @foreach($result as $item)
          <a  name={{$item->id}} id="numero" class="divItem list-group-item" style="text-decoration:none;" href=""  >
                <img class="child img-thumbnail rounded-circle" src={{asset(Storage::url($item->image_url))}} ></img>
                <h6  class="child" >{{$item->ref}}</h6>
                <h6  class="child">{{$item->pais}}</h6>
                <h6  class="child">{{$item->ddd}}</h6>
                <h6  class="child">{{$item->numero}}</h6>
                @if ($item->tipo == "personal")
                  <h6  class="child">Pessoa</h6>
                @else
                  <h6  class="child">Empresa</h6>
                @endif
                <h6  class="child">{{$item->grupo->nome}}</h6>
          </a>
        @endforeach
        </ul>
    </div>
    </div>

       </body>
@endsection
