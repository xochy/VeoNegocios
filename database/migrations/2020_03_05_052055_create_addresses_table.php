<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_address');
            $table->double('address_latitude');
            $table->double('address_longitude');
            $table->string('reference')->nullable();
            $table->string('schedule')->nullable();
            $table->string('slug')->unique();
            $table->bigInteger('store_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}