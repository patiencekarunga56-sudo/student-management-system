<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddCourse extends Model
{
    protected $table = 'add_courses';

    protected $fillable = [
        'course_code',
        'course_name',
        'department',
        'credit_units',
        'semester',
        'year_of_study',
    ];
}