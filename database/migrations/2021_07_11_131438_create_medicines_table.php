<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 32)->unique();
            $table->string('name');
            $table->text('details')->nullable();
            $table->double('price', 16, 2)->nullable();
            $table->double('selling_price', 16, 2)->nullable();
            $table->string('quantity');
            $table->foreignId('supplier_id');
            $table->foreignId('type_id');
            $table->foreignId('unit_id');
            $table->foreignId('category_id');
            $table->string('measurement');
            $table->boolean('is_active')->default(0);
            $table->string('barcode_number', 12);
            $table->string('photo')->nullable();
            $table->dateTime('photo_uploaded_at')->nullable();
            $table->boolean('is_prescribed');
            $table->date('expired_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
