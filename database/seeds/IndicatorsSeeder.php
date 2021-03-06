<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndicatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('indicators')->insert([
            ['name' => 'Валовый региональный продукт', 'group_id' => 1],
            ['name' => 'Валовый региональный продукт на душу населения', 'group_id' => 1],
            ['name' => 'Численность населения', 'group_id' => 1],
            ['name' => 'Удельный вес субъекта в общероссийских основных социально-экономических показателях в %', 'group_id' => 1],// делится на индустрии

            ['name' => 'Оборот организаций по видам экономической деятельности', 'group_id' => 2], // делится на индустрии
            ['name' => 'Распределение среднегодовой численности занятых по видам экономической деятельности в %', 'group_id' => 2],// делится на индустрии
            ['name' => 'Инвестиции в основной капитал по добыче полезных ископаемых', 'group_id' => 2],
            ['name' => 'Инвестиции в основной капитал по обрабатывающим производствам в %', 'group_id' => 2],
            ['name' => 'Экспорт субъектов федерации по ТЭК и машиностроению (% к итогу)', 'group_id' => 2],
            ['name' => 'Импорт субъектов федерации по ТЭК и машиностроению (% к итогу)', 'group_id' => 2],
            ['name' => 'Экспорт-стоимость субъектов федерации по ТЭК и машиностроению', 'group_id' => 2],
            ['name' => 'Объем отгруженной продукции по добыче топливно-энергетических полезных ископаемых', 'group_id' => 2],
            ['name' => 'Объем отгруженной продукции по добыче полезных ископаемых, кроме топливно-энергетических', 'group_id' => 2],
            ['name' => 'НДПИ по добыче каменного угля', 'group_id' => 2],
            ['name' => 'НДПИ по добыче нефти', 'group_id' => 2],
            ['name' => 'НДПИ по добыче природного газа', 'group_id' => 2],
            ['name' => 'НДПИ по добыче природного газа и газового конденсата', 'group_id' => 2],
            ['name' => 'Стоимость основных фондов ', 'group_id' => 2],
            ['name' => 'Ввод в действие основных фондов по добыче полезных ископаемых', 'group_id' => 2],
            ['name' => 'Ввод в действие основных фондов по обрабатывающим производствам', 'group_id' => 2],
            ['name' => 'Стоимость основных фондов по добыче полезных ископаемых', 'group_id' => 2],
            ['name' => 'Стоимость основных фондов по обрабатывающему  производству', 'group_id' => 2],
            ['name' => 'Структура основных фондов по видам экономической деятельности в процентах от общего объема основных фондов по полной учетной стоимости', 'group_id' => 2], // делится на индустрии
            ['name' => 'Ввод в действие основных фондов (всего)', 'group_id' => 2],
            ['name' => 'Ввод в действие основных фондов добыча полезных ископаемых', 'group_id' => 2],
            ['name' => 'Ввод в действие основных фондов обрабатывающие производства', 'group_id' => 2],
            ['name' => 'Валовое накопление основного капитала', 'group_id' => 2],

            ['name' => 'Ввод в действие основных фондов', 'group_id' => 3],
            ['name' => 'Степень износа основных фондов добыча полезных ископаемых', 'group_id' => 3],
            ['name' => 'Степень износа основных фондов обрабатывающие производства', 'group_id' => 3],
            ['name' => 'Число малых предприятий (на конец года), тыс', 'group_id' => 3],
            ['name' => 'Число малых предприятий на 10000 человек населения', 'group_id' => 3],
            ['name' => 'Среднесписочная численность работников (без внешних совместителей), тыс. человек', 'group_id' => 3],
            ['name' => 'Оборот малых предприятий, млрд. руб.', 'group_id' => 3],

            ['name' => 'Распределение малых предприятий обрабатывающая промышленность', 'group_id' => 4],
            ['name' => 'Структура объема отгруженной продукции "производство кокса и нефтепродуктов"', 'group_id' => 4],
            ['name' => 'Структура объема отгруженной продукции "химическое производство"', 'group_id' => 4],
            ['name' => 'Структура объема отгруженной продукции "производство резиновых и пластмассовых изделий"', 'group_id' => 4],
            ['name' => 'Структура объема отгруженной продукции "производство прочих неметаллических минеральных продуктов"', 'group_id' => 4],
            ['name' => 'Структура объема отгруженной продукции "металлургическое производство и производство готовых металлических изделий"', 'group_id' => 4],
            ['name' => 'Структура объема отгруженной продукции "производство машин, транспортных средств и оборудования"', 'group_id' => 4],
            ['name' => 'Структура объема отгруженной продукции "производство электро-оборудования, электронного и оптического оборудования"', 'group_id' => 4],
            ['name' => 'Распределение числа предприятий и организаций по видам экономической деятельности', 'group_id' => 4], // делится на индустрии
            ['name' => 'Инновационная активность организаций', 'group_id' => 4],
            ['name' => 'Внутренние затраты на научные исследования и разработки', 'group_id' => 4],
            ['name' => 'Разработано передовых производственных технологий', 'group_id' => 4],
            ['name' => 'Используемые передовые производственные технологии', 'group_id' => 4],
            ['name' => 'Организации, выполнявшие научные исследования и разработки', 'group_id' => 4],
            ['name' => 'Численность персонала, занятого научными исследованиями и разработками', 'group_id' => 4],
            ['name' => 'Поступление патентных заявок', 'group_id' => 4],
            ['name' => 'Подано патентных заявок на изобретения', 'group_id' => 4],
            ['name' => 'Подано патентных заявок на полезные модели', 'group_id' => 4],
            ['name' => 'Выдано патентов на изобретения', 'group_id' => 4],
            ['name' => 'Выдано патентов на полезные модели', 'group_id' => 4],
            ['name' => 'Затраты на технологические инновации', 'group_id' => 4],
            ['name' => 'Объем инновационных товаров, работ, услуг', 'group_id' => 4],
            ['name' => 'Индексы производства по виду экономической деятельности добыча полезных ископаемых', 'group_id' => 4],
            ['name' => 'Рентабельность активов организаций по добыче полезных ископаемых', 'group_id' => 4],
            ['name' => 'Рентабельность активов организаций обрабатывающих производств', 'group_id' => 4],
            ['name' => 'Рентабельность активов проданных товаров, продукции (работ, услуг) организаций', 'group_id' => 4],
            ['name' => 'Рентабельность активов проданных товаров, продукции (работ, услуг) по добыче полезных ископаемых', 'group_id' => 4],
            ['name' => 'Рентабельность активов проданных товаров, продукции (работ, услуг) организаций обрабатывающих производств', 'group_id' => 4],

            ['name' => 'Индекс потребительских цен', 'group_id' => 5],
            ['name' => 'Стоимость фиксированного набора потребительских товаров и услуг', 'group_id' => 5],
            ['name' => 'Стоимость фиксированного набора в процентах к российской стоимости', 'group_id' => 5],
            ['name' => 'Изменение фиксированного набора в процентах к декабрю предыдущего года', 'group_id' => 5],
            ['name' => 'Индексы потребительских цен на продовольственные товары', 'group_id' => 5],
            ['name' => 'Индексы потребительских цен на непродовольственные товары', 'group_id' => 5],
            ['name' => 'Инвестиции в основной капитал', 'group_id' => 5],
            ['name' => 'Инвестиции в основной капитал на душу населения', 'group_id' => 5]
        ]);
    }
}
