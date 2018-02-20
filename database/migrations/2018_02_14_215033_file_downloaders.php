<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FileDownloaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_downloaders', function (Blueprint $table) {
            $table->increments('id');
            $table->ipAddress('ip_downloader');	
            $table->string('country')->nullable();
            $table->integer('file_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('file_downloaders', function ( $table) {
            $table->foreign('file_id')->references('id')->on('files');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('file_downloaders', function ( $table) {
            $table->dropForeign('file_downloaders_file_id_foreign');                         
        });
        
        Schema::dropIfExists('file_downloaders');
    }
}
