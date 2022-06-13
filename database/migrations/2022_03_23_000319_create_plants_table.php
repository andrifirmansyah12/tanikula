<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->foreignId("farmer_id")->nullable();
            $table->foreignId("poktan_id")->nullable();
            $table->string("plant_tanaman")->nullable();
            $table->string("surface_area")->nullable();
            $table->string("address")->nullable();
            $table->dateTime("plating_date")->nullable();
            $table->dateTime("harvest_date")->nullable();
            $table->string("status")->nullable();
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
        Schema::dropIfExists('plants');
    }
}
