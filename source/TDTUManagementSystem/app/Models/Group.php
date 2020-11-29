<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $fillable = [
        'name', 'date_admission', 'date_graduation'
    ];

    public function students() {
        return $this->belongsToMany(
            Major::class,
            'students',
            'id_group',
            'id_major'
        )->using(Student::class)->withPivot('id',
            'firstname', 'middlename', 'lastname',
            'birthday', 'place_of_birth', 'origin',
            'gender', 'phone', 'address', 'email',
            'religion', 'kin', 'id_number', 'place_of_id_number',
            'nationality', 'major', 'talents', 'incomes',
            'career', 'description', 'date_of_union',
            'date_of_communist', 'date_of_student_union', 'date_of_dormitory',
            'room_of_dormitory', 'military', 'volunteer'
        )->withTimestamps();
    }
}
