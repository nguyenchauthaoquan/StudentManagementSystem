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

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:m:s',
        'updated_at' => 'datetime:d/m/Y H:m:s'
    ];

    public function faculties() {
        return $this->belongsToMany(
            Group::class,
            'groups',
            'id_training',
            'id_faculty'
        )->withPivot('id_group', 'date_admission', 'date_graduation')->withTimestamps();
    }
}
