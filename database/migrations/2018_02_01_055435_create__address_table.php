<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('address', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('city_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('state');
            $table->string('Address1');
            $table->string('Address2')->nullable();
            $table->string('zip_code')->nullable();
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
      
         Schema::dropIfExists('address');
    }
}
