<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = 'student';
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'confirm_password',
    ];
    public function registrations()
{
    return $this->hasMany(Registration::class);
}

public function courses()
{
    return $this->belongsToMany(Course::class, 'registrations')->withTimestamps();
}
}
