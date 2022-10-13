<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process', function (Blueprint $table) {
            $table->id();
            ///  SI = Shipper Information////

            $table->string('si_name');
            $table->string('si_region');
            $table->string('si_phone_number');
            $table->string('gi_carrier_ref_no');  //tracking numbeer
            $table->string('si_email');
            ///  RI = Reciever Information////
            $table->string('ri_name')->nullable();
            $table->string('ri_address')->nullable();
            $table->string('ri_number')->nullable();
            $table->string('ri_email')->nullable();
            ///  GI = Goods Information////

            $table->string('gi_origin')->nullable();
            $table->string('gi_destination')->nullable();
            $table->string('gi_weight')->nullable();
            $table->string('gi_product')->nullable();
            $table->string('gi_total_freight')->nullable();
            $table->string('gi_pickup_date')->nullable();
            $table->string('gi_package')->nullable();
            $table->string('gi_shipment_mode')->nullable();
            $table->string('gi_qty')->nullable();
            $table->string('gi_edd')->nullable(); //edd=expected dateof delivery
            $table->string('gi_pickup_time')->nullable();
            $table->string('gi_status')->nullable();
            $table->string('gi_typeof_shipment')->nullable();
            $table->string('gi_payment_mode')->nullable();
            $table->string('gi_departure_time')->nullable();
            $table->string('gi_comments')->nullable();
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
        Schema::dropIfExists('process');
    }
}
