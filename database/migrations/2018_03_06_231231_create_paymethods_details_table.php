<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymethodsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymethods_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('paymethod_id')->unsigned();
            $table->string('display_name')->nullable();
            $table->string('value');
            $table->timestamps();

            $table->foreign('paymethod_id')->references('id')->on('withdraw_methods')
                ->onUpdate('restrict')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paymethods_details', function ( $table) {
            $table->dropForeign('paymethods_details_paymethod_id_foreign');
        });
        Schema::dropIfExists('paymethods_details');
    }
}
