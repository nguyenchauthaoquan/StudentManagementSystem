<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function students() {
        return $this->belongsToMany(
            Student::class,
            'students_classrooms',
            'id_student',
            'id_classroom'
        );
    }

    public function education_system() {
        return $this->belongsTo(EducationSystem::class);
    }
}
