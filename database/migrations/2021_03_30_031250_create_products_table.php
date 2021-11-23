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
            $table->unsignedBigInteger('ebays_id');
            $table->foreign('ebays_id')->references('id')->on('ebays');
            $table->string('Title')->nullable();
            $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->string('itemID')->nullable();
            $table->string('ebay_id')->nullable();
            $table->float('originPrice')->nullable();
            $table->float('ratePrice')->nullable();
            $table->text('tags')->nullable();
            $table->text('vender')->nullable();
            $table->text('category')->nullable();
            $table->string('vender_id')->nullable();
            $table->text('vender_url')->nullable();
            $table->text('content')->nullable();
            $table->float('price')->nullable();
            $table->text('images')->nullable();
            $table->text('imagesDetails')->nullable();
            $table->string('option1_name')->nullable();
            $table->string('option2_name')->nullable();
            $table->string('option3_name')->nullable();
            $table->string('option1_picture')->nullable();
            $table->integer('delivery_date_min')->default('10');
            $table->integer('delivery_date_max')->default('20');
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
