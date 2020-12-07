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
        )->withTimestamps();
    }

    public function majors() {
        return $this->belongsToMany(
            Faculty::class,
            'majors',
            'id_training',
            'id_faculty'
        )->withTimestamps();
    }
}
