<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function faculty() {
        return $this->hasOne(Faculty::class, 'id_faculty');
    }

    public function classrooms() {
        return $this->belongsTo(Classroom::class, 'id_classroom');
    }
}
