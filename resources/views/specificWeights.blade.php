@include('layouts.header')
@include('indexTable')
@yield('login')
@yield('table_style')
<h3>Удельный вес</h3>
<br>

<h4 style="margin-left: 50px;">Таблица (год \ показатель):</h4>
@if($weights->isEmpty())
    <p style="font-size: 20px; margin-left: 50px;">Показателей не найдено</p>
@endif
<table>
    <tr>
        <th>Год</th>
        <th>Показатель</th>
    </tr>

    @foreach($weights as $weight)
        <tr>
            <td>
                @foreach($weight->years as $year)
                    {{$year->year}}
                @endforeach
            </td>
            <td>
                {{$weight->weight}}
            </td>
            @if(\Illuminate\Support\Facades\Auth::check())
                @foreach($weight->years as $year)
                    <td style="background: #F5F8FA; border: none;">
                        {!! Form::open(['method' => 'put','route' => ['deleteWeight',$region_id,$industry_id,$year->id]]) !!}
                        {{Form::hidden('column_name','weight')}}
                        <input type="submit" name="add" class="col-xs-offset-1 btn btn-default" value="Удалить значение"/>
                        {!! Form::close() !!}
                    </td>
                @endforeach
            @endif
        </tr>
    @endforeach

</table>
    @if(\Illuminate\Support\Facades\Auth::check())

        {!! Form::open(['method' => 'put', 'route' => ['createWeight',$region_id, $industry_id]]) !!}
        <h4 style="margin-left: 20px;">Введите значения, чтобы добавить новый показатель</h4>
        {{ Form::label('year','Год',['style'=>'margin-left:30px;']) }}
        {{ Form::text('year','',['style' => 'width:100px;'])}}
        {{ Form::label('value','Значение') }}
        {{ Form::text('value','',['style' => 'width:100px; '])}}
        {{ Form::hidden('column_name','weight')}}
        <input type="submit" name="add" class="col-xs-offset-1 btn btn-default" value="Добавить значение"/>
        {!! Form::close() !!}

    @endif
    {{--{!! Form::open(['method' => 'put', 'route' => ['createWeight',$region_id, $industry_id]]) !!}--}}
    {{--<h4 style="margin-left: 20px;">Введите значения, чтобы добавить новый показатель</h4>--}}
    {{--{{ Form::label('year','Год',['style'=>'margin-left:30px;']) }}--}}
    {{--{{ Form::text('year','',['style' => 'width:100px;'])}}--}}
    {{--{{ Form::label('value','Значение') }}--}}
    {{--{{ Form::text('value','',['style' => 'width:100px; '])}}--}}
    {{--{{Form::hidden('column_name','weight')}}--}}
    {{--<input name="column_name" type="hidden" value="{{old(\Illuminate\Support\Facades\Input::get('column_name'))}}">--}}
    {{--<input type="submit" name="add" class="col-xs-offset-1 btn btn-default" value="Добавить значение"/>--}}

    {{--{!! Form::close() !!}--}}

{{--@endif--}}