<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
      Schema::create('students_registry', function (Blueprint $table) {
    $table->id();
    $table->string('reg_number')->unique();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('program');
    $table->string('year_of_study');
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('add_students_table');
    }
};