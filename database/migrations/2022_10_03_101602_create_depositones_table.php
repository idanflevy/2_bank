<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depositones', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->float('amount', 19, 2);
            $table->string('description');
            $table->string('type');
            $table->string('balance')->nullable();
            $table->string('manual_deposit_date');
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
        Schema::dropIfExists('depositones');
    }
}
