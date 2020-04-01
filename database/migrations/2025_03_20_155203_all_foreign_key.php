<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('items', function (Blueprint $table){
            $table->foreign('elements_id')->references('id')->on('elements')->onDelete('cascade');
        });*/
        Schema::table('pictures', function (Blueprint $table){
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
        });
        Schema::table('views', function (Blueprint $table){
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
        });
        /*Schema::table('speakers', function (Blueprint $table){
            $table->foreign('elements_id')->references('id')->on('elements')->onDelete('cascade');
        });*/
        /*Schema::table('elements', function (Blueprint $table){
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
        });*/
        Schema::table('events', function (Blueprint $table){
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cities_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('types_id')->references('id')->on('types')->onDelete('cascade');
        });
        Schema::table('notifications', function (Blueprint $table){
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
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
