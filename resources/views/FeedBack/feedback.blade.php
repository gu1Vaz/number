@extends('layouts.layout_auths')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
          <link href="{{ asset('css/paginas/feedback.css') }}" rel="stylesheet">
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
    <div class="divGeral  d-flex flex-column w-100 align-items-center">
        <div class="logo d-flex flex-row justify-content-center  pl-5 align-items-center w-100">
            <a href="" class="text-decoration-none "><img  src="imgs/Logo.png"style="width:147px;height:43px;margin-top:6px;"></a>
        </div>
        <h4 class="mb-2 mt-2">Dê-nos seu FeedBack</h4>
        <div class="d-flex flex-column w-100 mt-3 align-items-center">
            <form method="POST" action="{{route('feedback.store')}}">
                @csrf
                @method('POST')
                <div class="form-group d-flex flex-column  align-items-center">
                    <div class="d-flex flex-row  form-check-inline justify-content-between w-100">
                        <h6>Avalie nosso site: </h6>
                        <input class="form-check-input" type="radio" name="avaliacao" id="avaliacao" value="1">
                        <input class="form-check-input" type="radio" name="avaliacao" id="avaliacao" value="2">
                        <input class="form-check-input" type="radio" name="avaliacao" id="avaliacao" value="3">
                        <input class="form-check-input" type="radio" name="avaliacao" id="avaliacao" value="4">
                        <input class="form-check-input" type="radio" name="avaliacao" id="avaliacao" value="5">
                    </div >
                    <div class="d-flex flex-row align-items-center" >
                        <h6>Diga suas obeservações: </h6>
                        <textarea class="form-control ml-3 mt-2" id="feedback" name="feedback" rows="3"></textarea>
                    </div>
                 </div>
                 <div class="d-flex flex row justify-content-center w-100">
                     <button type="submit" class="ml-5 btn card bg-primary border-0 w-15 text-light">Enviar</i></button>
                 </div>
            </form>
        </div>
    </div>

</body>
</html>

@endsection
