<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->time('order_time');
            $table->dateTime('order_date');
            $table->integer('discount');
            $table->integer('total');
            $table->string('status');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
        });

        Schema::create('order_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_product_type');
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('id_order')->references('id')->on('order')->onDelete('cascade');
            $table->foreign('id_product_type')->references('id')->on('product_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
        Schema::dropIfExists('order_detail');
    }
};
