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
        Schema::create('historyouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id');
            $table->string('drivername');
            $table->integer('totalCarfare');
            $table->integer('totalInvested');
            $table->integer('workCost');
            $table->integer('percent');
            $table->integer('totalCost');
            $table->integer('payment');
            $table->integer('balance');
            $table->integer('insurance');
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
        Schema::dropIfExists('historyouts');
    }
};
