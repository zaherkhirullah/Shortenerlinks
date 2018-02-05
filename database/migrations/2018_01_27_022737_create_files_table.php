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
            $table->integer('user_id')->unsigned();
            $table->integer('domain_id')->unsigned()->default(1);
            $table->integer('folder_id')->unsigned()->default(1);
            $table->string('slug',256)->unique();
            $table->string('title',256);
            $table->string('path',500);
            $table->string('description')->nullable();
            $table->integer('downloads')->default(0);
            $table->integer('views')->default(0);
            $table->string('password',255)->nullable();
            $table->boolean('isDeleted')->default(0);
            $table->boolean('isPrivate')->default(0);
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
        Schema::dropIfExists('files');
    }
}
