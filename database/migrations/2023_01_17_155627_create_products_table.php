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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('phone');
            $table->foreignId('driver_id');
            $table->foreignId('address_id');
            $table->foreignId('type_id');
            $table->integer('quantity');
            $table->integer('invested')->default(0);
            $table->integer('carfare');
            $table->boolean('is_paided')->default(false);
            $table->boolean('inGate')->default(false);
            $table->string('remark')->nullable();
            $table->string('outdriver_id')->references('id')->on('drivers')->nullable();
            $table->dateTime('outtime')->nullable();
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
};
