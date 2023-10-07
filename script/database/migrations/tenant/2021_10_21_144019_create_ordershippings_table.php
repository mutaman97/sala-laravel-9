<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordershippings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id')->nullable(); //rider id
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->string('shipping_driver')->default('local');//if you want to add shipping method set the variable
            $table->double('shipping_price')->default(0);
            $table->text('info')->nullable();
            $table->double('weight')->default(0);
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->integer('status_id')->default(3); //3= pending 1= complete 2= fail
            $table->string('tracking_no')->nullable();

            $table->foreign('order_id')
            ->references('id')->on('orders')
            ->cascadeOnDelete();

            $table->foreign('location_id')
            ->references('id')->on('locations')
            ->cascadeOnDelete();

            $table->foreign('shipping_id')
            ->references('id')->on('categories')
            ->cascadeOnDelete();

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordershippings');
    }
};
