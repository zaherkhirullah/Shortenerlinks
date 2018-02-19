<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('subject');
            $table->string('message');
            $table->string('path')->nullable();
            $table->boolean('isClosed')->default(0);
            $table->boolean('isDeleted')->default(0);
            $table->timestamps();
           
        });
        
        Schema::table('tickets', function ( $table) {
            $table->foreign('user_id')->references('id')->on('users');
         });
         
    }
    
    public function down()
    {
        Schema::table('tickets', function ( $table) {
            $table->dropForeign('tickets_user_id_foreign');        
         });
        Schema::dropIfExists('tickets');
       
    }
}
