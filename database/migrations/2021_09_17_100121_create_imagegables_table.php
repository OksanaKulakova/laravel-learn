<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagegablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagegables', function (Blueprint $table) {
            $table->unsignedBigInteger('image_id');
            $table->unsignedBigInteger('imagegable_id');
            $table->string('imagegable_type');

            $table->unique(['image_id', 'imagegable_id', 'imagegable_type']);

            $table->foreign('image_id')->references('id')->on('images')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagegables');
    }
}
