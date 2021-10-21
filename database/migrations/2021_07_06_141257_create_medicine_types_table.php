<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineTypesTable extends Migration
{
    public function up()
    {
        Schema::create('medicine_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicine_types');
    }
}
