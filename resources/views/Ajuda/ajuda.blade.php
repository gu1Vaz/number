@extends('layouts.layout_navBar')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
          <link href="{{ asset('css/paginas/ajuda.css') }}" rel="stylesheet">
    </head>
    <body style="padding:12px 12px 0 12px;"class="antialiased">
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
    <div class="divGeral  d-flex flex-row w-100 align-items-center">
        <div class="divAjuda d-flex flex-column  p-4 w-100 ">
              <div  class="d-flex  flex-row w-100  mt-5 m-3">
                      <div class="d-flex flex-column w-50">
                            <h5 style="font-weight:bold;">Perguntas Frequentes</h5>
                            <div class="mt-3 accordion w-100 h-100" id="grupoDuvidas">
                                    <div >
                                        <div class="pergunta rounded-top card bg-primary shadow-sm  border-primary" id="headingOne">
                                        <h5 class="mb-0 ">
                                            <button class="colapsed btn d-flex flex-row align-items-center" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <h6>Como faço login?</h6>
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                        </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#grupoDuvidas">
                                        <div class="resposta rounded-bottom card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="pergunta rounded-0 card bg-primary shadow-sm  border-primary" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="colapsed btn d-flex flex-row align-items-center" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                               <h6>Como me cadastro?</h6>
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                        </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#grupoDuvidas">
                                        <div class="resposta rounded-0 card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                        </div>
                                    </div>

                                    <div >
                                        <div class="pergunta rounded-0 card bg-primary shadow-sm  border-primary" id="heading3">
                                        <h5 class="mb-0">
                                            <button class="colapsed btn d-flex flex-row align-items-center" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                               <h6>Como vejo um numero?</h6>
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                        </h5>
                                        </div>
                                        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#grupoDuvidas">
                                        <div class="resposta rounded-0 card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                        </div>
                                    </div>
                            </div>
                       </div>
                       <div class="d-flex flex-column w-50">
                            <h5 style="font-weight:bold;">Envie sua duvida para que possamos ajuda-lo:</h5>
                            <form method="POST" action="{{route('ajuda.store')}}">
                            @csrf
                            @method('POST')
                            <div class="form-group d-flex flex-column align-items-center">
                                    <textarea class="form-control ml-3 mt-2" id="duvida" name="duvida" rows="3"></textarea>
                                    <button type="submit" class=" m-2 btn card bg-primary border-0 w-15 text-light">Enviar</i></button>
                                </div>
                            </div

                            </form>
                       </div>

                   </div>
         </div>
    </body>
</html>

@endsection
