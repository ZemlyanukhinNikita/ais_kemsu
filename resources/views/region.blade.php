@include('layouts.header')
@yield('login')
<h2 style="margin-left: 30px;">{{$region->region}}</h2>
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
    @foreach ($groups as $group)
        <li><a style="text-decoration: none" href="{{$region->id}}/group/{{$group->id}}">{{ $group->name }}</a></li>
    @endforeach
</ul>

