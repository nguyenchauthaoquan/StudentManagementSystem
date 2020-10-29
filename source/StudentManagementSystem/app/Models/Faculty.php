<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    public function classroom() {
        return $this->hasMany(Classroom::class, 'id_faculty');
    }

    public function student() {
        return $this->hasMany(Student::class, 'id_faculty');
    }

    public function teacher() {
        return $this->hasOne(Teacher::class, 'id_faculty');
    }

    public function announcements() {
        return $this->belongsToMany(
            Announcement::class,
            'faculties_announcements',
            'id_faculty',
            'id_announcement'
        );
    }
}
