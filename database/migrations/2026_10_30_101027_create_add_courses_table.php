<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('add_courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_code')->unique();
            $table->string('course_name');
            $table->string('department');
            $table->unsignedTinyInteger('credit_units');
            $table->string('semester');
            $table->string('year_of_study');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('add_courses');
    }
};