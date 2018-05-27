@include('layouts.header')
@yield('login')

<h3>{{$region->region}}</h3><br>
<h4>{{$group->name}}</h4><br>
<h4>{{$indicator->name}}</h4><br>
<style type="text/css">
    a {text-decoration: none; color: #286B9A}
    a:visited { color: #31708f }
    a:active { color: #FFCA0F }
    a:hover {
        text-decoration: underline; /* Делает ссылку подчеркнутой при наведении на нее курсора */
        color: #FFCA0F; /* Цвет ссылки */
    }
</style>

<h4>Выберите отрасль: </h4>
<ul>
    @foreach ($industries as $industry)
        <li><a style="text-decoration: none" href="industries/{{$industry->id}}/industryValues">{{ $industry->name }}</a></li>
    @endforeach
</ul>