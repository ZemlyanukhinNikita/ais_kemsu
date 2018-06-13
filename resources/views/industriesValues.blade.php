@include('layouts.header')
@include('layouts.indexTable')
@yield('login')
@yield('table_style')
<h3>{{$region->region}}</h3><br>
<h4>{{$group->name}}</h4><br>
<h4>{{$indicator->name}}</h4><br>
<h4>{{$industry->name}}</h4><br>

<h3>Таблица (год \ показатель):</h3>
@if($values->isEmpty())
    <h3>Показатели не найдены</h3>
@endif
<table>
    <tr>
        <th>Год</th>
        <th>Показатель</th>
    </tr>
    @foreach($values as $value)
        <tr>
            <td>
                @foreach($value->years as $year)
                    {{$year->year}}
                @endforeach
            </td>
            <td>{{$value->value}}</td>
            @if(\Illuminate\Support\Facades\Auth::check())
                @foreach($value->years as $year)
                    <td style="background: #F5F8FA; border: none;">
                        {!! Form::open(['method'=>'delete','action'=>'IndustriesValuesController@destroy', 'route' => ['industryValues.destroy',$ids[0],$ids[1],$ids[2],$ids[3],$value->id]]) !!}
                        {{Form::hidden('year_id',$year->id)}}
                        <input type="submit" name="add" class="col-xs-offset-1 btn btn-default" value="Удалить значение"/>
                        {!! Form::close() !!}
                    </td>
                @endforeach
            @endif
        </tr>
    @endforeach

</table>
<br>
@if(\Illuminate\Support\Facades\Auth::check())
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach

            </ul>
        </div>
    @endif
    {!! Form::open(['method' => 'post','action'=>'IndicatorValuesController@store' ,'route' => ['industryValues.store',$ids[0],$ids[1],$ids[2], $ids[3]]]) !!}
    <h4 style="margin-left: 20px;">Введите значения, чтобы добавить новый показатель</h4>
    {{ Form::label('year','Год',['style'=>'margin-left:30px;']) }}
    {{ Form::text('year','',['style' => 'width:100px;'])}}
    {{ Form::label('value','Значение') }}
    {{ Form::text('value','',['style' => 'width:100px; '])}}
    <input type="submit" name="add" class="col-xs-offset-1 btn btn-default" value="Добавить значение"/>
    {!! Form::close() !!}
@endif
