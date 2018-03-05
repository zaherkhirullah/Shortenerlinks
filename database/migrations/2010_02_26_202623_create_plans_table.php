<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->string('icon')->nullable();
            $table->float('space_size');
            $table->float('monthly_price');
            $table->float('yearly_price');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
