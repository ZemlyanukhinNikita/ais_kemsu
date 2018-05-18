<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->insert([
            ['industry_name' => 'Всего'],
            ['industry_name' => 'Сельское хозяйство'],
            ['industry_name' => 'Рыболовство'],
            ['industry_name' => 'Домашние услуги'],
            ['industry_name' => 'Добыча полезных ископаемых'],
            ['industry_name' => 'Обрабатывающее производство'],
            ['industry_name' => 'Производство и распределение электроэнергии, газа и воды'],
            ['industry_name' => 'Транспорт и связь'],
            ['industry_name' => 'Коммунальные услуги'],
            ['industry_name' => 'Торговля'],
            ['industry_name' => 'Финансовая деятельность'],
            ['industry_name' => 'Гостиницы и рестораны'],
            ['industry_name' => 'Операции с недвижимостью'],
            ['industry_name' => 'Госуправление'],
            ['industry_name' => 'Образование'],
            ['industry_name' => 'Здравоохранение'],
        ]);
    }
}
