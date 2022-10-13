<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            $table->string('type')->default('user');
            // $table->string('portal')->default('comet');
            $table->string('email')->unique();
            //personal contact
            $table->string('customer_id');
            $table->string('account_number');
            $table->string('customer_category');

            $table->string('title');
            $table->string('middle_name');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('dob');
            $table->string('idcard');
            //contact details
            $table->string('country');
            $table->string('city');
            $table->string('mobile');
            $table->string('street');
            $table->string('transfer_count');
            $table->string('transfer_status');
            // $table->string('email');
            $table->string('preferred_name');
            $table->string('preferred_city');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
