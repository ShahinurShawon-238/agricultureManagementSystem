<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warehouse_place_id');
            $table->foreign('warehouse_place_id')->references('id')->on('warehouse_places')->onDelete('cascade');
            $table->string('info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_infos');
    }
}
