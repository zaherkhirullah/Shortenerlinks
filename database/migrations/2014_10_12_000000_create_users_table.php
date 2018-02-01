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
            $table->string('username',255)->unique();
            $table->string('email')->unique();
            $table->boolean('confirm_email')->default(0);
            $table->string('password',255);
            $table->string('phone_number',255)->default(0);
            $table->string('address1',255)->default(0);
            $table->string('address2',255)->nullable();
            $table->string('city',255)->default(0);
            $table->string('state',255)->default(0);
            $table->string('zip',255)->default(0);
            $table->string('country',255)->default(0);
            $table->string('withdrawal_email',255)->default(0);
            $table->string('withdrawal_method',255)->default(0);
            $table->float('advertiser_balance',255)->default(0);
            $table->float('publisher_balance',255)->default(0);
            $table->integer('role')->comment('owner,admin,user')->default(3);
            $table->string('status',255)->comment('active,pending,inactive')->default(3);
            $table->string('avatar',255)->nullable();
            $table->boolean('isDeleted')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
