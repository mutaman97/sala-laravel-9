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
        Schema::create('tenantorders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->string('tenant_id');

            $table->foreign('order_id')
            ->references('id')->on('orders')
            ->cascadeOnDelete();

            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenantorders');
    }
};
