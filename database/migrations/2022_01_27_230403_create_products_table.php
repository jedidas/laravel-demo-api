<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            $table->string('name', 255);
            $table->string('slug', 255)->nullable();
            $table->string('code')->unique();
            $table->string('image', 255)->nullable();
            $table->double('price', 16, 2)->default(0.0);
            $table->double('discount')->default(0);
            $table->boolean('active')->default(true);
            $table->longText('description');

            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');

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

