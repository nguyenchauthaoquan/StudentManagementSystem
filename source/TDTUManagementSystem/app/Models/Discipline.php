<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $table = 'disciplines';
    protected $fillable = [
    ];
    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:m:s',
        'updated_at' => 'datetime:d/m/Y H:m:s'
    ];

    public function groups() {
        return $this->hasMany(Group::class, 'id_faculty');
    }

    public function teachers() {
        return $this->hasMany(Teacher::class, 'id_faculty');
    }
}
