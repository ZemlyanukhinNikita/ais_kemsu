<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecificWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specific_weights', function (Blueprint $table) {
            $table->increments('id');
            $table->float('weight')->nullable();
            $table->integer('industry_id')->unsigned()->nullable();
            $table->integer('year_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
        });

        Schema::table('specific_weights', function($table) {
            $table->foreign('industry_id')->references('id')->on('industries');
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
