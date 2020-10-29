<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function classrooms() {
        return $this->belongsToMany(
            Student::class,
            'students_classrooms',
            'id_student',
            'id_classroom'

        );
    }

    public function faculties() {
        return $this->belongsToMany(
            Faculty::class,
            'students_faculties',
            'id_student',
            'id_faculty'
        );
    }

    public function disciplines() {
        return $this->hasMany(Discipline::class, 'id_student');
    }

    public function detail() {
        return $this->hasOne(Detail::class, 'id_student');
    }
}
