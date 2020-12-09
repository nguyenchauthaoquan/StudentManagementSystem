<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'credits'
    ];

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'id_faculty');
    }

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
}
