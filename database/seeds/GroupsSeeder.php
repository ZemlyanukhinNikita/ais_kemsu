<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            ['name' => 'Общая характеристика региона'],
            ['name' => 'Оценка ресурсозависимсоти региона'],
            ['name' => 'Показатели уровня развития региона'],
            ['name' => 'Оценка готовности региона к комплексному освоению недр'],
            ['name' => 'Готовность субъекта федерации к реализации проектов,
                        ориентированных на формирование
                        сбалансированной  пространственной специализации,
                        в том числе в рамках совместных проектов власти и бизнеса']
        ]);
    }
}
