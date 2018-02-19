<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkVisitors extends Migration
{
   
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkVisitors', function (Blueprint $table) {
            $table->increments('id');
            $table->ipAddress('ip_visitor');	            
            $table->string('country')->nullable();
            $table->integer('link_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('linkVisitors', function ( $table) {
            $table->foreign('link_id')->references('id')->on('links');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        Schema::table('linkVisitors', function ( $table) {
        //  $table->dropForeign('linkVisitors_link_id_foreign');                
        });
        Schema::dropIfExists('linkVisitors');
    }
}
