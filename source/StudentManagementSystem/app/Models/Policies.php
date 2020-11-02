<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{
    use HasFactory;

    protected $table = 'policies';
    protected $dateFormat = 'd/m/Y';
    protected $fillable = [
        'area', 'date_of_military', 'year_of_volunteer'
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'id_student');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'id_teacher');
    }
}
