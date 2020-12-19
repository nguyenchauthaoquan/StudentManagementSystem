<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'credits'
    ];
    public $incrementing = false;

    public function scores() {
        return $this->belongsToMany(
            Score::class,
            'scores',
            'id_subject',
            'id_student'
        )->using(Score::class)->withPivot(
            'grade'
        );
    }

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'id_faculty');
    }

    public function programs() {
        return $this->belongsToMany(
            TrainingProgram::class,
            'programs_subjects',
            'id_subject',
            'id_training'
        );
    }
}
