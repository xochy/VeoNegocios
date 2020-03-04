<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('name', 50);
            $table->string('description', 200);
            $table->float('score', 3, 1)->default(5.0);
            $table->string('slug')->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();   
            $table->timestamps();
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}