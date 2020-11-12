<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    use HasFactory;

    protected $table = 'training_programs';
    protected $dateFormat = 'd/m/Y';

    protected $fillable = [
        'name', 'system'
    ];

    public function groups() {
        return $this->hasMany(Group::class, 'id_group');
    }
}
