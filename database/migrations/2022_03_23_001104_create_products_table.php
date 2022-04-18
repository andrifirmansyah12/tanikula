<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("slug")->unique();
            $table->string("image")->nullable();
            $table->foreignId("category_product_id")->nullable();
            $table->string("code")->unique();
            $table->bigInteger("stoke")->nullable();
            $table->bigInteger("price")->nullable();
            $table->text("desc")->nullable();
            $table->foreignId("user_id")->nullable();
            $table->boolean("is_active")->nullable();
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
        Schema::dropIfExists('products');
    }
}
