<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body  id="body" style="padding:12px 12px 0 12px;">
    <div style="display:flex;flex-direction:column;"> 
        <div>
                <a href="/" class="text-decoration-none "><img  src="imgs/Logo.png"style="width:147px;height:43px;margin-top:6px;"></a>
        </div>
        <ul style="list-style: none;margin-top:80px;" >
            @foreach($favoritos as $item)
                <li>
                    <h6  style="border-bottom: 1px solid grey;">{{$item->ref}}       {{$item->numero}}          {{$item->tipo}}</h6>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
