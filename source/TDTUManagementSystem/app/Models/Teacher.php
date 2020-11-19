<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'firstname', 'middlename', 'lastname',
        'birthday', 'place_of_birth', 'origin',
        'gender', 'phone', 'address', 'email',
        'academic_rank', 'degree', 'religion',
        'kin', 'id_number', 'place_of_id_number',
        'nationality', 'talents', 'incomes',
        'career', 'description', 'date_of_union',
        'date_of_communist', 'date_of_student_union'
    ];

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'id_faculty');
    }

    public function backgrounds() {
        return $this->hasMany(Background::class, 'id_teacher');
    }

    public function policies() {
        return $this->hasMany(Policy::class, 'id_teacher');
    }
}
