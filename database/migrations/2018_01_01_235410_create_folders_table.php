<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->boolean('isDeleted')->default(0);
            $table->timestamps();
            $table->unique(['name','user_id']);
            $table->index('user_id');
        });

        // Schema::table('folders', function ($table) {
        //     $table->foreign('user_id')->references('id')->on('users');
        //  });
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    //     Schema::table('folders', function ( $table) {
    //     $table->dropForeign('folders_user_id_foreign');
    // });
        Schema::dropIfExists('folders');
        
    }
}
