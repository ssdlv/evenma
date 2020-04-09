<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mestable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city_name');
            $table->boolean('city_status')->default(false);
            $table->boolean('delete')->default(false);
            $table->bigInteger('city_created')->default(time());
            $table->bigInteger('city_updated')->default(time());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
