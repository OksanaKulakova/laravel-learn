<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('body');
            $table->integer('price');
            $table->integer('old_price')->nullable();
            $table->text('salon')->nullable();
            $table->unsignedBigInteger('car_class_id')->nullable();
            $table->string('kpp')->nullable();
            $table->integer('year')->nullable();
            $table->string('color')->nullable();
            $table->unsignedBigInteger('car_body_id')->nullable();
            $table->unsignedBigInteger('car_engine_id')->nullable();
            $table->boolean('is_new')->default(false);
            $table->foreign('car_class_id')->references('id')->on('car_classes');
            $table->foreign('car_body_id')->references('id')->on('car_bodies');
            $table->foreign('car_engine_id')->references('id')->on('car_engines');
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
        Schema::dropIfExists('cars');
    }
}
