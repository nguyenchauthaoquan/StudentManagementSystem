<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function classrooms() {
        return $this->belongsTo(Classroom::class, 'id_classroom');
    }

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'id_faculty');
    }

    public function disciplines() {
        return $this->hasMany(Discipline::class, 'id_student');
    }

    public function detail() {
        return $this->hasOne(Detail::class, 'id_student');
    }
}
