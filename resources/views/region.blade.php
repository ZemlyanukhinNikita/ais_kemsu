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
<script>
    function down()
    {
        var obj=document.getElementById('down');
        if(obj.style.display=='none')
            obj.style.display='block';
        else
            obj.style.display='none';
    }
</script>
<ul style="margin-left: 20px;">
    <div><li><a href="javascript: down()">Общая характеристика региона</a></li></div>
    <div name="down" id="down" style="text-indent:15pt;display:none"><ul>
            {{--Валовый региональный продукт--}}
            {{Form::open(['id' => 'grp','route' =>  ['generalCharacteristic', $region->id,'gross_regional_product']])}}
            <li><a href="" onclick="document.getElementById('grp').submit();
        return false;">1.1. Валовый региональный продукт</a></li>
            {{Form::close()}}

            {{--Валовый региональный продукт на душу населения--}}
            {{Form::open(['id' => 'grpHuman','route' =>  ['generalCharacteristic', $region->id,'grp_human']])}}
            <li><a href="" onclick="document.getElementById('grpHuman').submit();
        return false;">1.2. Валовый региональный продукт на душу населения</a></li>
            {{Form::close()}}

            {{--Численность населения--}}
            {{Form::open(['id' => 'population','route' =>  ['generalCharacteristic', $region->id,'population']])}}
            <li><a href="" onclick="document.getElementById('population').submit();
        return false;">1.3. Численность населения</a></li>
            {{Form::close()}}

            <li><a href="{{url('/regions/'.$region->id.'/industries')}}">1.4. Удельный вес субъекта в общероссийских основных социально-экономических показателях в %</a></li>
    </div>
    <li><a href="#secondgroup">Оценка ресурсозависимсоти региона</a></li>
    <li><a href="#thirdgroup">Показатели уровня развития региона</a></li>
    <li><a href="#fourthgroup">Оценка готовности региона к комплексному освоению недр</a></li>
    <li><a href="#fifthgroup">Готовность субъекта федерации к реализации проектов,
    ориентированных на формирование<br>
    сбалансированной  пространственной специализации,
    в том числе в рамках совместных проектов власти и бизнеса</a></li>
</ul>

<br>
<br>
<br>

<h3 style="margin-left: 20px;"><p id="firstgroup">Группа №1. Общая характеристика региона:</p></h3>

    <script lang="javascript">
    function doButton(id) {
        document.getElementById(id).submit();
        return false;
    }
    </script>
<ul>
    {{--Валовый региональный продукт--}}
    {{Form::open(['id' => 'grp','route' =>  ['generalCharacteristic', $region->id,'gross_regional_product']])}}
    <li><a href="" onclick="document.getElementById('grp').submit();
        return false;">1.1. Валовый региональный продукт</a></li>
    {{Form::close()}}

    {{--Валовый региональный продукт на душу населения--}}
    {{Form::open(['id' => 'grpHuman','route' =>  ['generalCharacteristic', $region->id,'grp_human']])}}
    <li><a href="" onclick="document.getElementById('grpHuman').submit();
        return false;">1.2. Валовый региональный продукт на душу населения</a></li>
    {{Form::close()}}

    {{--Численность населения--}}
    {{Form::open(['id' => 'population','route' =>  ['generalCharacteristic', $region->id,'population']])}}
    <li><a href="" onclick="document.getElementById('population').submit();
        return false;">1.3. Численность населения</a></li>
    {{Form::close()}}

    <li><a href="{{url('/regions/'.$region->id.'/industries')}}">1.4. Удельный вес субъекта в общероссийских основных социально-экономических показателях в %</a></li>
</ul>
<h3 style="margin-left: 20px;"><p id="secondgroup">Группа №2. Оценка ресурсозависимсоти региона:</p></h3>


<h3 style="margin-left: 20px;"><p id="thirdgroup">Группа №3. Показатели уровня развития региона:</p></h3>


<h3 style="margin-left: 20px;"><p id="fourthgroup">Группа №4. Оценка готовности региона к комплексному освоению недр:</p></h3>


<h3 style="margin-left: 20px;"><p id="fifthgroup">Группа №5.  Готовность субъекта федерации к реализации проектов,
ориентированных на формирование
сбалансированной  пространственной специализации,
        в том числе в рамках совместных проектов власти и бизнеса :</p></h3>

<ul>
    {{--Индекс потребительских цен --}}
    {{Form::open(['id' => 'consumer_price_index','method'=>'get','route' => ['partnership.show',$region->id,'consumer_price_index']])}}
    <li><a href="" onclick="document.getElementById('consumer_price_index').submit();
        return false;">5.1.1 Индекс потребительских цен</a></li>
    {{Form::close()}}

    {{--Стоимость фиксированного набора потребительских товаров и услуг  --}}
    {{Form::open(['id' => 'cost_consumer_goods','method'=>'get','route' => ['partnership.show',$region->id,'cost_consumer_goods']])}}
    <li><a href="" onclick="document.getElementById('cost_consumer_goods').submit();
        return false;">5.1.2 Cтоимость фиксированного набора потребительских товаров и услуг </a></li>
    {{Form::close()}}

    {{--Стоимость фиксированного набора потребительских товаров и услуг в процентах --}}
    {{Form::open(['id' => 'percent_fixed_stuff','method'=>'get','route' => ['partnership.show',$region->id,'percent_fixed_stuff']])}}
    <li><a href="" onclick="document.getElementById('percent_fixed_stuff').submit();
        return false;">5.1.2.1 Стоимость фиксированного набора потребительских товаров и услуг в процентах</a></li>
    {{Form::close()}}

    {{--Изменение фиксированного набора в процентах к декабрю предыдущего года --}}
    {{Form::open(['id' => 'edit_percent_fixed_stuff','method'=>'get','route' => ['partnership.show',$region->id,'edit_percent_fixed_stuff']])}}
    <li><a href="" onclick="document.getElementById('edit_percent_fixed_stuff').submit();
        return false;">5.1.2.2 Изменение фиксированного набора в процентах к декабрю предыдущего года</a></li>
    {{Form::close()}}

    {{--Индексы потребительских цен на продовольственные товары --}}
    {{Form::open(['id' => 'index_foodstuffs','method'=>'get','route' => ['partnership.show',$region->id,'index_foodstuffs']])}}
    <li><a href="" onclick="document.getElementById('index_foodstuffs').submit();
        return false;">5.1.3 Индексы потребительских цен на продовольственные товары</a></li>
    {{Form::close()}}

    {{--Индексы потребительских цен на непродовольственные товары  --}}
    {{Form::open(['id' => 'index_non_foodstuffs','method'=>'get','route' => ['partnership.show',$region->id,'index_non_foodstuffs']])}}
    <li><a href="" onclick="document.getElementById('index_non_foodstuffs').submit();
        return false;">5.1.4 Индексы потребительских цен на непродовольственные товары </a></li>
    {{Form::close()}}

    {{--Инвестиции в основной капитал --}}
    {{Form::open(['id' => 'investments','method'=>'get','route' => ['partnership.show',$region->id,'investments']])}}
    <li><a href="" onclick="document.getElementById('investments').submit();
        return false;">5.2 Инвестиции в основной капитал</a></li>
    {{Form::close()}}

    {{--Инвестиции в основной капитал на душу населения  --}}
    {{Form::open(['id' => 'investments_human','method'=>'get','route' => ['partnership.show',$region->id,'investments_human']])}}
    <li><a href="" onclick="document.getElementById('consumer_price_index').submit();
        return false;">5.3 Инвестиции в основной капитал на душу населения </a></li>
    {{Form::close()}}
</ul>