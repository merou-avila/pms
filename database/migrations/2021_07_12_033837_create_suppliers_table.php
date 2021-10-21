<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 32)->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact_number', 20)->nullable();
            $table->string('address')->nullable();
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
