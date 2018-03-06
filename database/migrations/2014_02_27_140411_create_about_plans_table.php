<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        Schema::create('plans_abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id')->unsigned();
            $table->integer('about_id')->unsigned();
            $table->boolean('value');
            $table->boolean('isDeleted')->default(0);
            $table->timestamps();
            $table->unique(['plan_id', 'about_id']);
        
            $table->foreign('plan_id')->references('id')->on('plans')
                ->onUpdate('restrict')
                ->onDelete('cascade');
            $table->foreign('about_id')->references('id')->on('about_plans')
                ->onUpdate('restrict')
                ->onDelete('cascade');


        });

        
    }

    public function down()
    {
        Schema::table('plans_abouts', function ( $table) {
            $table->dropForeign('plans_abouts_about_id_foreign');
            $table->dropForeign('plans_abouts_plan_id_foreign');
        });
        Schema::dropIfExists('about_plans');
        Schema::dropIfExists('plans_abouts');
    }
}
