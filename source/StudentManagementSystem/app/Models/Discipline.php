<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    public function student() {
        return $this->belongsTo(Student::class, 'id_student');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'id_teacher');
    }
}
