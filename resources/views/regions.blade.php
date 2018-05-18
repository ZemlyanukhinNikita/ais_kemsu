@include('layouts.header')
@yield('login')
<h2>Информационная система<br> поддержки степени
    выраженности ресурсного типа<br> развития регионов</h2>

<style type="text/css">
   h2 {text-align: center; color: #2a88bd;}
   h3 {align-content: center;}
   a {text-decoration: none; color: #286B9A}
   a:visited { color: #31708f }
   a:active { color: #FFCA0F }
   a:hover {
       text-decoration: underline; /* Делает ссылку подчеркнутой при наведении на нее курсора */
       color: #FFCA0F; /* Цвет ссылки */
   }
</style>
<h3 style="margin-left: 50px;">Список регионов:</h3>
<ul>

@foreach ($regions as $region)
    <li style="margin-left: 30px;"><a style="text-decoration: none;" href="/regions/{{$region->id}}">{{ $region->region }}</a></li>
        @endforeach

</ul>