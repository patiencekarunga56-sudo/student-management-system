<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'role',
        'password',
        'confirm_password',
    ];
    public function student()
{

    return $this->belongsTo(Student::class);
}

public function course()
{
    return $this->belongsTo(Course::class);
}
}
