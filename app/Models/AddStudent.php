<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddStudent extends Model
{
    protected $table = 'students_registry';

    protected $fillable = [
        'reg_number',
        'name',
        'email',
        'program',
        'year_of_study',
    ];
}