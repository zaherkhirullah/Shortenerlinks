<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawTable extends Migration
{
   
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
             $table->string('status',256);
            $table->float('amount')->scale(6)->precision(50)->default(0);
            $table->integer('payment_id');
            $table->string('transaction_id');
            $table->boolean('isDeleted')->default(0);
            $table->timestamps();
        });  
    }

    public function down()
    {
        Schema::dropIfExists('withdrows');
    }
}
