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

        Schema::create('country', function (Blueprint $table) {
             $table->increments('id');
            $table->string('sembol')->nullable();
            $table->string('name');
            $table->float('link_price')
                  ->scale(6)->precision(50)->default(0.40);
            $table->float('file_price')
                  ->scale(6)->precision(50)->default(0.40);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
          Schema::create('city', function (Blueprint $table) {
              $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->string('name');
            $table->string('zip_code')->nullable();
            $table->timestamps();

            $table->unique('zip_code');
            $table->engine = 'InnoDB';
        });

       Schema::create('address', function (Blueprint $table)
        {
            
            $table->increments('id');
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('state');
            $table->string('city');
            $table->string('Address1');
            $table->string('Address2')->nullable();
            $table->string('zip_code')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('city');
        Schema::dropIfExists('country');
    }
}

   