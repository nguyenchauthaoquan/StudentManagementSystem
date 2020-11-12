<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $dateFormat = 'd/m/Y';
    protected $fillable = [
        'id', 'date_admission', 'date_graduation'
    ];

    public function training_program() {
        return $this->belongsTo(TrainingProgram::class, 'id_training');
    }

    public function students() {
        return $this->hasMany(Student::class, 'id_group');
    }

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'id_faculty');
    }
}
