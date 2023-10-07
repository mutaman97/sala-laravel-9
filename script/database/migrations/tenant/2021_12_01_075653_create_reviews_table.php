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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('term_id');
            $table->integer('rating')->default(5);
            $table->text('comment')->nullable();

            $table->foreign('order_id')
            ->references('id')->on('orders')
            ->cascadeOnDelete();

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->cascadeOnDelete();

            $table->foreign('term_id')
            ->references('id')->on('terms')
            ->cascadeOnDelete();
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
        Schema::dropIfExists('reviews');
    }
};
