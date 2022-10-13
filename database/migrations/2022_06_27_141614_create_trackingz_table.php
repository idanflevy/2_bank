<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackingz', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('gi_carrier_ref_no');
            $table->string('ti_date');
            $table->string('ti_time');
            $table->string('ti_activities');
            $table->string('ti_location');
            $table->foreign('gi_carrier_ref_no')->references('id')->on('courier')->onDelete('cascade');
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
        Schema::dropIfExists('trackingz');
    }
}
