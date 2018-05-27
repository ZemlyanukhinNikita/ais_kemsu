@include('layouts.header')
@yield('login')

<h2 style="margin-left: 30px;">{{$region->region}}</h2>
<h3 style="margin-left: 30px;">{{$group->name}}</h3>
<style type="text/css">
    a {text-decoration: none; color: #286B9A}
    a:visited { color: #31708f }
    a:active { color: #FFCA0F }
    a:hover {
        text-decoration: underline; /* Делает ссылку подчеркнутой при наведении на нее курсора */
        color: #FFCA0F; /* Цвет ссылки */
    }
</style>


<ul>
    @foreach ($indicators as $indicator)
        <li><a style="text-decoration: none" href="{{$group->id}}/indicator/{{$indicator->id}}/values">{{ $indicator->name }}</a></li>
    @endforeach
</ul>