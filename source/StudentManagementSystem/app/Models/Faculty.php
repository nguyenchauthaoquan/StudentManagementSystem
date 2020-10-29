<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    public function classroom() {
        return $this->hasOne(Classroom::class, 'id_faculty');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'id_faculty');
    }

    public function teacher() {
        return $this->hasOne(Teacher::class, 'id_faculty');
    }
}
