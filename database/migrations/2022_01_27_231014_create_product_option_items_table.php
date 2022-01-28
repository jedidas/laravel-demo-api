<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->double('price', 16, 2)->default(0.0);
            $table->string('image', 255)->nullable();
            $table->boolean('active')->default(true);

            $table->bigInteger('product_option_id')->unsigned();
            $table->foreign('product_option_id')->references('id')->on('product_options');
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
        Schema::dropIfExists('product_option_items');
    }
}
