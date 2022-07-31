@extends('layouts.layout_auths')
@section('content')

<head>
         <link href="{{ asset('css/paginas/perfil.css') }}" rel="stylesheet">
</head>
<body>
        <div class="links">
                <div class="logo">
                    <a href="" class="text-decoration-none "><img  src="{{ URL::to('/') }}/imgs/Logo.png"  style="width:147px;height:43px;" ></a>
                </div>
           <div>
            <a style="margin: 4px;" href="{{ url('/') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">Pagina Inicial</a>
            <a style="margin: 4px;" href="{{ url('/home') }}" class="text-sm font-weight-bold text-gray-700 text-decoration-none">Meus Contatos</a>
            <a style="margin: 4px;" href="{{ url('/ajuda') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">Ajuda</a>
            <a style="margin: 4px;" href="{{ url('/feedback') }}" class="text-sm font-weight-bold text-gray-700  text-decoration-none">FeedBack</a>
           </div>
        </div>
        <form class="w-100 h-100" method="POST"  enctype="multipart/form-data" action="{{route('feedback.update',Auth::user()->id)}}" >
                @csrf
                @method('PUT')
        <div class="boasVindas ">
            <div class="w-50 d-flex flex-row justify-content-center">
                 <h3>Meu Perfil</h3>
            </div>
            <div class="mt-4 h-100 w-50 d-flex flex-column align-items-center">
                <img class=" img-thumbnail rounded-circle"  src={{asset(Storage::url(Auth::user()->image_url))}} ></img>
                <input  class="w-50 ml-5 mt-2 "  type="file" name="image" id="image">
            </div>
        </div>
        <div class="dadosUsuario">

              <div class="d-flex flex-column">
                  <div class="d-flex flex-row h-25 align-items-center">
                     <h4>Nome:  </h4>
                     <input class="w-75 form-control"type="text" value="{{Auth::user()->name}}" name="nome" id="nome">
                  </div>
                  <div class="d-flex flex-row h-25 align-items-center mt-2">
                     <h4>Cidade:  </h4>
                     <input class="w-75 form-control"type="text" value="{{Auth::user()->cidade}}" name="cidade" id="cidade">
                  </div>
                  <div class="d-flex flex-row h-25 align-items-center mt-2">
                     <h4>Cep:  </h4>
                     <input class="w-75 form-control"type="text" value="{{Auth::user()->cep}}" name="cep" id="cep">
                  </div>

              </div>
              <hr style="width:1px;height:60%;border-left:1px solid;margin:0;margin:0 10% 0 10%;">
              <div class="d-flex flex-column">
                       <div class="d-flex flex-row h-25 align-items-center ">
                            <h4>Email:  </h4>
                            <input class="w-75 form-control"type="text" value="{{Auth::user()->email}}" name="email" id="email">
                        </div>
                        <div class="d-flex flex-row h-25 align-items-center mt-2">
                            <h4>Numero:  </h4>
                            <input class="w-75 form-control"type="text" value="{{Auth::user()->telefone}}" name="telefone" id="telefone">
                        </div>

              </div>
           </div>
           <div class="d-flex flex-row justify-content-end w-100">
             <button type="submit" class="btn card bg-primary  mt-2 text-light border-0 d-flex flex-row align-items-center justify-content-center">Salvar Dados</button>
           </div>
        </form>
</body>


@endsection
