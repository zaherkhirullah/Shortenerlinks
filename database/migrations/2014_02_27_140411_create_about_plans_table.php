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
            $table->integer('plan_id')-> unsigned();        
            $table->integer('about_id')->unsigned();        
            $table->boolean('value')->default(0);
            $table->timestamps();
            $table->primary('plan_id','about_id');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_plans');
        Schema::dropIfExists('plans_abouts');
    }
}
