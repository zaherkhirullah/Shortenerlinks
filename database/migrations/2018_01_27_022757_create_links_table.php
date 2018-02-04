<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('domain_id')->unsigned();
            $table->integer('ad_id')->unsigned()
                                    ->comment('\'Interstitial Advertisement ($$$$$)\',\'Framed Banner ($$$)\',\'No Advert\'');
            $table->string('url',500);
            $table->string('original_url',500);
            $table->string('alias',256);
            $table->string('hits')->default(0); // ziaretci
            $table->boolean('isDeleted')->default(0);
            $table->string('status',256)->comment('active,inactive,hidden');
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
        Schema::dropIfExists('links');
    }
}
