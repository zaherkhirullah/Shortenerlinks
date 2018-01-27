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
            $table->string('username',256)->unique();
            $table->string('email')->unique();
            $table->string('password',256);
            $table->string('phone_number',256);
            $table->string('address1',256);
            $table->string('address2',256);
            $table->string('city',256);
            $table->string('state',256);
            $table->string('zip',256);
            $table->string('country',256);
            $table->string('withdrawal_email',256);
            $table->string('withdrawal_method',256);
            $table->float('advertiser_balance',256);
            $table->float('publisher_balance',256);
            $table->string('role',256);
            $table->string('status',256)->comment('active,inactive,pending');
            $table->string('avatar',256)->nullable();
            $table->boolean('confirm_email')->default(0);
            $table->boolean('isDeleted')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
