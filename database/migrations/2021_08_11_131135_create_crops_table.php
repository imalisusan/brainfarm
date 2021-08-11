<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('lowest_temperature')->nullable();
            $table->integer('highest_temperature')->nullable();
            $table->integer('lowest_humidity')->nullable();
            $table->integer('highest_humidity')->nullable();
            $table->integer('lowest_atmospheric_pressure')->nullable();
            $table->integer('highest_atmospheric_pressure')->nullable();
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
        Schema::dropIfExists('crops');
    }
}
