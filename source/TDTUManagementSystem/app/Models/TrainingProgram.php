<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    use HasFactory;

    protected $table = 'training_programs';

    protected $fillable = [
        'name', 'system'
    ];

    public function groups() {
        return $this->belongsToMany(
            Faculty::class,
            'groups',
            'id_training',
            'id_faculty'
        )->withTimestamps();
    }
}
