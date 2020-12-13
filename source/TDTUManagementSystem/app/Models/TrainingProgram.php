<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    use HasFactory;

    protected $table = 'training_programs';

    protected $fillable = [
        'name', 'system', 'status'
    ];

    public function groups() {
        return $this->belongsToMany(
            Faculty::class,
            'groups',
            'id_training',
            'id_faculty'
        )->using(Group::class)
            ->withPivot('id','name', 'date_admission', 'date_graduation', 'status')
            ->withTimestamps();
    }

    public function majors() {
        return $this->belongsToMany(
            Faculty::class,
            'majors',
            'id_training',
            'id_faculty'
        )->using(Group::class)
            ->withPivot('id','name', 'status')
            ->withTimestamps();
    }

    public function subjects() {
        return $this->belongsToMany(
            Subject::class,
            'programs_subjects',
            'id_training',
            'id_subject'
        );
    }
}
