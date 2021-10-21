<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 32)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
