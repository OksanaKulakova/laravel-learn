<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCarsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            if (Schema::hasColumn('cars', 'image_id')) {
                $table->unsignedBigInteger('image_id')->nullable()->change();
            } else {
                $table->unsignedBigInteger('image_id')->nullable();
                $table->foreign('image_id')->references('id')->on('images')->cascadeOnDelete();
            }
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
