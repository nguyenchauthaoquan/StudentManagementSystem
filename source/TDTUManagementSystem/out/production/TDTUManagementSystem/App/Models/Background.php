<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;

    protected $table = 'backgrounds';
    protected $fillable = [
        'name', 'relationship', 'birthday',
        'phone', 'job', 'email', 'resident',
        'workplace', 'incomes_source', 'career',
        'description'
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'id_student');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'id_teacher');
    }
}
