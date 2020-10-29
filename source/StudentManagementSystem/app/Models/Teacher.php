<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'id_faculty');
    }

    public function disciplines() {
        return $this->hasMany(Discipline::class, 'id_teacher');
    }

    public function detail() {
        return $this->hasOne(Detail::class, 'id_teacher');
    }
}
