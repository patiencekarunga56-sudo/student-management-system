<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'lecturer_id'];

    // A course belongs to a lecturer
    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    // A course has many registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // A course belongs to many students through registrations
    public function students()
    {
        return $this->belongsToMany(User::class, 'registrations')->withTimestamps();
    }
}
