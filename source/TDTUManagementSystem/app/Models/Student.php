<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Student extends Pivot
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'id_group', 'id_major',
        'firstname', 'middlename', 'lastname',
        'birthday', 'place_of_birth', 'origin',
        'gender', 'phone', 'address', 'email',
        'religion', 'kin', 'id_number', 'place_of_id_number',
        'nationality', 'talents', 'incomes',
        'career', 'description', 'date_of_union',
        'date_of_communist', 'date_of_student_union', 'date_of_dormitory',
        'room_of_dormitory', 'military', 'volunteer', 'status'
    ];

    public function backgrounds() {
        return $this->hasMany(Background::class, 'id_student');
    }

    public function policies() {
        return $this->hasMany(Policy::class, 'id_student');
    }
}
