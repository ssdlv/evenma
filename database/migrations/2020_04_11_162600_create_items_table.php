<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_title');
            $table->bigInteger('item_start');
            $table->bigInteger('item_end');
            $table->enum('item_status', [-1,0,1])->default(-1);
            $table->bigInteger('elements_id')->unsigned();
            $table->boolean('delete')->default(false);
            $table->bigInteger('item_created')->default(time());
            $table->bigInteger('item_updated')->default(time());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
