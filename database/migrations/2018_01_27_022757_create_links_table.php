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
            $table->float('earnings',8,4)->scale(6)->default(0); 
            $table->boolean('isDeleted')->default(0);
            $table->string('status',256)
                  ->comment('active,inactive,hidden')->default(1);
            $table->timestamps();
         
            
        });
        Schema::table('links', function ( $table) {
            $table->index('user_id');
            $table->index('domain_id');
            $table->index('folder_id');
            $table->index('ad_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
            $table->foreign('ad_id')->references('id')->on('ads_types')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('links', function ( $table) {
        //     $table->dropForeign('links_user_id_foreign');
        //     $table->dropForeign('links_domain_id_foreign');
        //     $table->dropForeign('links_folder_id_foreign');
        //     $table->dropForeign('links_ad_id_foreign');
        //     $table->dropIndex  ('links_user_id_index');
        //     $table->dropIndex  ('links_domain_id_index');
        //     $table->dropIndex  ('links_folder_id_index');
        //     $table->dropIndex  ('links_ad_id_index');

        // });

        
        Schema::dropIfExists('links');

    }
}
