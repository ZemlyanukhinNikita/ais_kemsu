@include('layouts.header')
@yield('login')
<div style="padding-left: 20px">
{!! Form::open(['action'=>'ReportsController@export', 'route' => 'export']) !!}
{{Form::label('regions', 'Выберите регион')}}<br>
{{Form::select('regions',$region, null, ['class'=>'col-xs-4'])}}<br>
{{Form::label('regions', 'Выберите группу')}}<br>
{{Form::select('groups',$group, null, ['class'=>'col-xs-4'])}}<br><br>
<input type="submit" name="add" class="col-xs-offset-1 btn btn-default" value="Сформировать отчет"/><br>
{!! Form::close() !!}
</div>



{{--{!! Form::open(['action'=>'ReportsController@export', 'route' => 'export']) !!}--}}
{{--<input type="submit" name="add" class="col-xs-offset-1 btn btn-default" value="Export Ecxel"/>--}}
{{--{!! Form::close() !!}--}}