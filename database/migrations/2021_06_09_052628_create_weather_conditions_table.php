<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('condition');
            $table->string('condition_desc');
            $table->text('condition_icon');
            $table->integer('temperature');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('weather_conditions');
    }
}
