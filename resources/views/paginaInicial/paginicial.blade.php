@extends('layouts.layout_navBar')
@section('content')
<head>
       <link href="{{ asset('css/paginas/inicial.css') }}" rel="stylesheet">
</head>
<body id ="body" style="padding:12px 12px 0 12px;"class="antialiased">
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
    <div
       @foreach ($dados as $item => $aux)
        <div class="d-flex flex-column">

                <h5 class="font-weight-bold" >{{ $aux['nome'] }}</h5>
                <div class="d-flex flex-row overflow-auto mb-4">
                @foreach($aux['numeros'] as $value)
                <div  class="Contato d-flex flex-row card bg-white shadow-sm  m-2 border-white mb-3  " style="width: 17rem; height:8rem;">
                        <a name={{$value['id']}}  class=" card-body p-0 ml-2 d-flex flex-row align-items-center text-decoration-none"  style="width: 100%; height:100%;" href="" id="numero" style="width: 100%; height:100%;" >
                            <div style="pointer-events:none;" "class="d-flex flex-row  imgCircle w-50">
                                <img id="imagem" src={{asset(Storage::url($value['image_url']))}}  class="imgCircle img-thumbnail rounded-circle">
                            </div>
                            <div style="pointer-events:none;" class="d-flex flex-column min p-1 .textos align-items-center w-100">
                                <spanCard class="font-weight-bold">  {{$value['ref']}}</spanCard>
                                <spanCard > {{$value['pais']}} {{$value['ddd']}} {{$value['numero']}}</spanCard>
                            </div>

                        </a>
                    @guest
                    @else
                    <form style="width:32px;height:32px;"method="POST" action="{{route('favorito.update',$value['id'])}}" >
                                    @csrf
                                    @method('PUT')
                                    <button  type="submit" class="btn m-o border-0 w-5 d-flex flex-row align-items-center justify-content-center"><i class="fa fa-star"></i></button>
                    </form>
                    @endguest
                 </div>
                 @endforeach
                 </div>
         </div>
        @endforeach

    </body>
@endsection
