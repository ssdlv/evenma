<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_title');
            $table->text('event_desc');
            $table->text('event_location');
            $table->bigInteger('event_date')->default(time());
            $table->bigInteger('event_start')->default(time());
            $table->bigInteger('event_end')->default(time() + 7200);
            //$table->enum('user_child_type', [0,1])->default(1);
            $table->enum('event_priority', [0,1,2,3,4,5])->default(0);
            $table->boolean('event_state')->default(false);
            $table->string('event_image')->default('urlToImage');
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('cities_id')->unsigned();
            $table->bigInteger('types_id')->unsigned();
            $table->boolean('delete')->default(false);
            $table->bigInteger('event_created')->default(time());
            $table->bigInteger('event_updated')->default(time());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
