<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->float('price',8,4);
            $table->integer('user_id')->unsigned()->default(0);
            $table->integer('ad_id')->unsigned()->default(0);
            $table->string('transaction_id')->default('-');
            $table->string('transaction_details')->nullable();
            $table->string('status')
            ->comment('Under Review, Pending Payment, Canceled Payment, Invalid Payment, Refunded, Active, Paused, Finished, Canceled');
            $table->boolean('default_campaign')->default(0);
            $table->datetime('started');
            $table->datetime('completed');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
