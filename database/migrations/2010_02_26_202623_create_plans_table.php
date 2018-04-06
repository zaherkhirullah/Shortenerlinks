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
            $table->float('space_size')->nullable();
            $table->float('monthly_price');
            $table->float('yearly_price');
            $table->float('ref_earnings')->default(0);
            $table->float('max_file_size')->default(size_toByte(200));
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
