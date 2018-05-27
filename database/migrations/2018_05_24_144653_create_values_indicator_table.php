<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValuesIndicatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values_indicator', function (Blueprint $table) {
            $table->increments('id');
            $table->float('value');
            $table->integer('year_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('indicator_id')->unsigned()->nullable();
            $table->integer('industry_id')->unsigned()->nullable();
        });

        Schema::table('values_indicator', function($table) {
            $table->foreign('indicator_id')->references('id')->on('indicators');
            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('industry_id')->references('id')->on('industries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('values_indicator');
    }
}
