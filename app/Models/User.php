<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // <-- Added Spatie Trait

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable; // <-- Added HasRoles here

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_approved',
        'approved_at',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'approved_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    // A student has many course registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // A student is registered to many courses
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'registrations')->withTimestamps();
    }

    // A lecturer is assigned many courses
    public function assignedCourses()
    {
        return $this->hasMany(Course::class, 'lecturer_id');
    }
}
