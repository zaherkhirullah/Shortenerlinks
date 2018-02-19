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
        Schema::create('fileDownloaders', function (Blueprint $table) {
            $table->increments('id');
            $table->ipAddress('ip_Downloader');	
            $table->string('country')->nullable();
            $table->integer('file_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('fileDownloaders', function ( $table) {
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

        Schema::table('fileDownloaders', function ( $table) {
        // $table->dropForeign('fileDownloaders_file_id_foreign');                         
        });
        
        Schema::dropIfExists('fileDownloaders');
    }
}
