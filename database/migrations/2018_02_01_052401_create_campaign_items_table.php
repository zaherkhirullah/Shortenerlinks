<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->unsigned()->default(0);
            $table->integer('country')->unsigned()->default(0); 
            $table->integer('views')->default(0);
            $table->integer('purchase')->default(0);
            $table->float('weight')->default(0);
             $table->float('advertiser_price')
            ->default(0)->scale(6)->precision(50);
            $table->float('publisher_price')
            ->default(0)->scale(6)->precision(50);  
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
        Schema::dropIfExists('campaign_items');
    }
}
