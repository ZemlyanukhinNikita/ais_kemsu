@include('layouts.header')
@include('layouts.indexTable')
@yield('login')
@yield('table_style')
<h3>Таблица (год \ показатель):</h3>
@if($characteristics->isEmpty())
    <h3>Показатели не найдены</h3>
@endif
<table>
    <tr>
        <th>Год</th>
        <th>Показатель</th>
    </tr>
    @foreach($characteristics as $char)

        <tr>
            <td>
                @foreach($char->years as $year)
                    {{$year->year}}
                @endforeach
            </td>
            <td>{{$char->$column}}</td>
            @if(\Illuminate\Support\Facades\Auth::check())
                @foreach($char->years as $year)
                    <td style="background: #F5F8FA; border: none;">
                        {!! Form::open(['method'=>'delete','route' => ['partnership.destroy',$region_id,$year->id]]) !!}
                        {{Form::hidden('column_name',$column)}}
                        <input type="submit" name="add" class="col-xs-offset-1 btn btn-default" value="Удалить значение"/>
                        {!! Form::close() !!}
                    </td>
                @endforeach
            @endif
        </tr>
    @endforeach

</table>
@if(\Illuminate\Support\Facades\Auth::check())

    {!! Form::open(['method' => 'post', 'route' => ['partnership.new',$region_id]]) !!}
    <h4 style="margin-left: 20px;">Введите значения, чтобы добавить новый показатель</h4>
    {{ Form::label('year','Год',['style'=>'margin-left:30px;']) }}
    {{ Form::text('year','',['style' => 'width:100px;'])}}
    {{ Form::label('value','Значение') }}
    {{ Form::text('value','',['style' => 'width:100px; '])}}
    {{ Form::hidden('column_name',$column)}}
    <input type="submit" name="add" class="col-xs-offset-1 btn btn-default" value="Добавить значение"/>
    {!! Form::close() !!}
@endif

