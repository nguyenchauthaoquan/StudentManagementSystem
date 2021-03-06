<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculties';
    protected $keyType = 'string';
    protected $fillable = [
        'id', 'name'
    ];

    public function groups() {
        return $this->belongsToMany(
            TrainingProgram::class,
            'groups',
            'id_faculty',
        'id_training'
        )->using(Group::class)
            ->withPivot('name', 'date_admission', 'date_graduation')
            ->withTimestamps();
    }

    public function teachers() {
        return $this->hasMany(Teacher::class, 'id_faculty');
    }

    public function majors() {
        return $this->belongsToMany(
            TrainingProgram::class,
            'majors',
            'id_faculty',
        'id_training'
        )->using(Major::class)->withPivot( 'id', 'name')->withTimestamps();
    }
}
