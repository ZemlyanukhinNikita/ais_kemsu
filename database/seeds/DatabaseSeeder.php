<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             YearSeeder::class,
             RegionsSeeder::class,
             GroupsSeeder::class,
             IndicatorsSeeder::class,
             IndustriesSeeder::class
             ]);
    }
}
