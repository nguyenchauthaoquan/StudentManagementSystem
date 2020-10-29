<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training_Program extends Model
{
    use HasFactory;

    public function classrooms() {
        return $this->hasMany(Classroom::class, 'id_training');
    }
}
