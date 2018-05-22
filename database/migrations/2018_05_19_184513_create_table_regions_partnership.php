<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRegionsPartnership extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions_partnership', function (Blueprint $table) {
            $table->increments('id');
            $table->float('consumer_price_index')->nullable();;
            $table->float('cost_consumer_goods')->nullable();;
            $table->float('percent_fixed_stuff')->nullable();;
            $table->float('edit_percent_fixed_stuff')->nullable();;
            $table->float('index_foodstuffs')->nullable();;
            $table->float('index_non_foodstuffs')->nullable();;
            $table->float('investments')->nullable();;
            $table->float('investments_human')->nullable();;
            $table->integer('year_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
        });

        Schema::table('regions_partnership', function($table) {
            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
