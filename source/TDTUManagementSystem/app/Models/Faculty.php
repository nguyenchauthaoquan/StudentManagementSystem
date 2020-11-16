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
    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:m:s',
        'updated_at' => 'datetime:d/m/Y H:m:s'
    ];

    public function training_programs() {
        return $this->belongsToMany(
            Group::class,
            'groups',
            'id_faculty',
        'id_training'
        )->withPivot('id_group', 'date_admission', 'date_graduation')->withTimestamps();
    }

    public function teachers() {
        return $this->hasMany(Teacher::class, 'id_faculty');
    }
}
