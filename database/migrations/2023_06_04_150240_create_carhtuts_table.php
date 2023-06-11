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
        Schema::create('carhtuts', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('driver');
            $table->string('about');
            $table->integer('amount');
            $table->string('monthsaryin_id');
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
        Schema::dropIfExists('carhtuts');
    }
};
