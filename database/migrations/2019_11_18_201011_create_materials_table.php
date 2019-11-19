<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kod');
            $table->string('nazwa');
            $table->unsignedBigInteger('material_group_id');
            $table->unsignedBigInteger('unit_of_measure_id');
            $table->foreign('material_group_id')->references('id')->on('material_grupas');
            $table->foreign('unit_of_measure_id')->references('id')->on('jednostka_miaries');
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
        Schema::dropIfExists('materials');
    }
}
