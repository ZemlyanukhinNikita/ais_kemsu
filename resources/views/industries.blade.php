@include('layouts.header')
@yield('login')
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
<h3 style="margin-left: 30px;">Выберите отрасль:</h3>
<ul>

    @foreach ($industries as $industry)
        <li><a style="text-decoration: none" href="industries/{{$industry->id}}">{{ $industry->industry_name }}</a></li>
    @endforeach


</ul>