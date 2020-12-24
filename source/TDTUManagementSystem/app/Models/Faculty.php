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
        'id', 'name', 'status'
    ];

    public function groups() {
        return $this->belongsToMany(
            TrainingProgram::class,
            'groups',
            'id_faculty',
        'id_training'
        )->using(Group::class)
            ->withPivot('id','name', 'date_admission', 'date_graduation', 'status')
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
        )->using(Major::class)
            ->withPivot( 'id', 'name', 'status')
            ->withTimestamps();
    }

    public function subjects() {
        return $this->hasMany(
            Subject::class,
            'id_faculty'
        );
    }


}
