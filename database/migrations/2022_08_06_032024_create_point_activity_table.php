<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_activity', function (Blueprint $table) {

        $table->unsignedBigInteger('point_id');
        $table->unsignedBigInteger('activity_id');

        $table->foreign('point_id')->references('id')->on('points')->cascadeOnDelete();
        $table->foreign('activity_id')->references('id')->on('activities')->cascadeOnDelete();
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
        Schema::dropIfExists('point_activity');
    }
}
