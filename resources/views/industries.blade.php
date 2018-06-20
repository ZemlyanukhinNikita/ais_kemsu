@include('layouts.header')
@yield('login')


<h3 style="margin-left: 20px;">{{$region->region}}</h3>
<p style="margin-left: 20px; font-size: 18px;">{{$group->name}}</p>
<p style="margin-left: 20px; font-size: 18px;">{{$indicator->name}}</p>
<style type="text/css">
    a {text-decoration: none; color: #286B9A}
    a:visited { color: #31708f }
    a:active { color: #FFCA0F }
    a:hover {
        text-decoration: underline; /* Делает ссылку подчеркнутой при наведении на нее курсора */
        color: #FFCA0F; /* Цвет ссылки */
    }
</style>

<h4 style="margin-left: 20px;">Выберите отрасль: </h4>
<ul>
    @foreach ($industries as $industry)
        <li><a style="text-decoration: none" href="industries/{{$industry->id}}/industryValues">{{ $industry->name }}</a></li>
    @endforeach
</ul>