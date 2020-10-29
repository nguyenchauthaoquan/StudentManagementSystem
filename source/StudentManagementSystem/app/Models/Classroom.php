<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function training_program() {
        return $this->belongsTo(Training_Program::class, 'id_training');
    }

    public function students() {
        return $this->belongsToMany(
            Student::class,
            'students_classrooms',
            'id_classroom',
            'id_student'
        );
    }

    public function faculties() {
        return $this->belongsToMany(
          Faculty::class,
          'classrooms_faculties',
          'id_classroom',
          'id_faculty'
        );
    }

}
