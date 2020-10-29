<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function training_programs() {
        return $this->belongsTo(Training_Program::class, 'id_training');
    }

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'id_faculty');
    }

    public function students() {
        return $this->hasMany(Student::class, 'id_faculty');
    }
}
