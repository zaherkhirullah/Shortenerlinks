<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawMethodsTable extends Migration
{
    public function up()
    { 
        Schema::create('withdraw_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->float('min_amount')->default(5);
            $table->string('icon')->nullable();
             $table->boolean('isDeleted')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('withdraw_methods');
    }
}
