<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('element_title');
            $table->bigInteger('element_date');
            $table->enum('element_status', [-1,0,1])->default(-1);
            $table->bigInteger('events_id')->unsigned();
            $table->boolean('delete')->default(false);
            $table->bigInteger('element_created')->default(time());
            $table->bigInteger('element_updated')->default(time());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elements');
    }
}
