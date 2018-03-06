<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('domain_id')->unsigned()->default(1);
            $table->integer('folder_id')->unsigned()->default(1);
            $table->ipAddress('ip')->nullable();
            $table->string('slug',255)->unique();
            $table->string('title',255)->nullable();
            $table->string('path',500);
            $table->string('size',500)->nullable();
            $table->string('file_name',250);
            $table->string('shorted_url',255);
            $table->string('description',1000)->nullable();
            $table->integer('downloads')->default(0);
            $table->integer('views')->default(0);
            $table->float('earnings',8,4)->scale(6)->default(0);
            $table->string('password',255)->nullable();
            $table->boolean('isDeleted')->default(0);
            $table->boolean('isPrivate')->default(0);
            $table->timestamps();
        });
        
        Schema::table('files', function($table) {
            $table->index('user_id');
            $table->index('domain_id');
            $table->index('folder_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
        });
     
     
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function ( $table) {
    
        $table->dropForeign('files_user_id_foreign'  );
        $table->dropForeign('files_domain_id_foreign');
        $table->dropForeign('files_folder_id_foreign');
        $table->dropIndex('files_user_id_index');
        $table->dropIndex('files_domain_id_index');
        $table->dropIndex('files_folder_id_index');
        }); 
    Schema::dropIfExists('files');        

    }
}
