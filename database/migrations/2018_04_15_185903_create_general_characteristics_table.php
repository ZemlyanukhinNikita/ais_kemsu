<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('year_id')->unsigned()->nullable();//год
            $table->float('gross_regional_product')->nullable();//валовый региональный продукт
            $table->float('grp_human')->nullable();//валовый региональный продукт на душу населения
            $table->float('population')->nullable();//численность населения
        });

        Schema::table('general_characteristics', function($table) {
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('year_id')->references('id')->on('years');
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
