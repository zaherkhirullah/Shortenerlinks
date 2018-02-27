<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
   
    public function up()
    {
          Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('username',255);
            $table->string('email',255);
            $table->integer('role_id')->unsigned()->default(4);
            $table->integer('plan_id')->unsigned()->default(1);
            $table->boolean('confirm_email')->default(0);
            $table->string('password',255);
            $table->integer('referred_by')->unsigned()->nullable();
            $table->string('affiliate_id')->unique();
            $table->string('status',255)
                  ->comment('active,pending,inactive')->default(1);
            $table->boolean('isDeleted')->default(0);
            $table->text('permissions')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
          
            $table->unique('username');
            $table->unique('email');
            $table->engine = 'InnoDB';
        });
        Schema::table('users', function ( $table) {
         $table->foreign('role_id')->references('id')->on('roles');
         $table->foreign('plan_id')->references('id')->on('plans');
        });

        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('avatar',255)->nullable();
            $table->string('phone_number',255)->default(0);
            $table->string('withdrawal_email',255)->nullable();
            $table->integer('withdrawal_method_id')->unsigned()->nullable();
            $table->string('location')->nullable();     
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        
        Schema::create('Balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->float('avilable_amount',8,4)->default(0);
            $table->float('advertiser_balance',8,4)->default(0);
            $table->float('publisher_balance',8,4)->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
            // $table->primary('id' ,'user_id');
        });
    }
    public function down()
    {
        Schema::table('users', function ( $table) {
            $table->dropForeign('users_role_id_foreign');
            $table->dropForeign('users_plan_id_foreign');
        });
           
        Schema::dropIfExists('users'); 
        Schema::dropIfExists('profile'); 
        Schema::dropIfExists('Balances');
    }
}
