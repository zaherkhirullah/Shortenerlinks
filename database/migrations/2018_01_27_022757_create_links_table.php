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
            $table->integer('domain_id')->unsigned()->default(1);
            $table->integer('folder_id')->unsigned()->default(1);
            $table->integer('ad_id')->unsigned()
                                    ->comment('\'Interstitial Advertisement ($$$$$)\',\'Framed Banner ($$$)\',\'No Advert\'');
            $table->string('url',500);
            $table->string('shorted_url',500);
            $table->string('alias',256)->nullable();
            $table->string('slug',256)->unique();
            $table->integer('clicks')->default(0); 
            $table->float('earning')->scale(6)->default(0); 
            $table->boolean('isDeleted')->default(0);
            $table->string('status',256)
                  ->comment('active,inactive,hidden')->default(1);
            $table->timestamps();
            $table->index('user_id');
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
