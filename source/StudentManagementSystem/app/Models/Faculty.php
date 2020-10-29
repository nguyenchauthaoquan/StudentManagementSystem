<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    public function announcements() {
        return $this->belongsToMany(
            Faculty::class,
            'faculties_announcements',
            'id_faculty',
            'id_announcement'
        );
    }

    public function classrooms() {
        return $this->belongsToMany(
            Classroom::class,
            'classrooms_faculties',
            'id_faculty',
            'id_classroom'

        );
    }

    public function students() {
        return $this->belongsToMany(
          Student::class,
          'students_faculties',
          'id_faculty',
          'id_student'
        );
    }

    public function teachers() {
        return $this->belongsToMany(
            Teacher::class,
            'teachers_faculties',
            'id_faculty',
            'id_teacher'
        );
    }

}
