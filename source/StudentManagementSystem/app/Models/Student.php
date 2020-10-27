<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function detail() {
        return $this->hasOne(Detail::class);
    }

    public function classrooms() {
        return $this->belongsToMany(
            Classroom::class,
            'students_classrooms',
            'id_classroom',
            'id_student'
        );
    }
}
