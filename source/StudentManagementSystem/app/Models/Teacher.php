<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function teachers() {
        return $this->belongsToMany(
            Teacher::class,
            'teachers_faculties',
            'id_teacher',
            'id_faculty',
        );
    }

    public function disciplines() {
        return $this->hasMany(Discipline::class, 'id_student');
    }

    public function detail() {
        return $this->hasOne(Detail::class, 'id_teacher');
    }

}
