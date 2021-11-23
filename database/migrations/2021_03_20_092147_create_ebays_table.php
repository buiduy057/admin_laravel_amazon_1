<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEbaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('ebayname')->nullable();
            $table->string('selling_paypal')->nullable();
            $table->text('authToken')->nullable();
            $table->text('oauthUserToken')->nullable();
            $table->string('default_break')->nullable();
            $table->string('default_payment')->nullable();
            $table->string('default_shipping')->nullable();
            $table->string('default_return')->nullable();
            $table->bigInteger('default_return_id')->nullable();
            $table->bigInteger('default_payment_id')->nullable();
            $table->bigInteger('default_shipping_id')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('sold')->nullable();
            $table->integer('sales')->nullable();
            $table->integer('listings')->nullable();
            $table->integer('views')->nullable();
            $table->integer('numbers')->nullable();
            $table->text('payment_policy')->nullable();
            $table->text('return_policy')->nullable();
            $table->text('shipping_policy')->nullable();
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
        Schema::dropIfExists('ebays');
    }
}
