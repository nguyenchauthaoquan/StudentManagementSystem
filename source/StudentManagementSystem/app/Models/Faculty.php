<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'faculties';
    protected $dateFormat = 'd/m/Y';
    protected $fillable = [
        'id', 'name', 'head'
    ];

    public function groups() {
        return $this->hasMany(Group::class, 'id_faculty');
    }

    public function teachers() {
        return $this->hasMany(Teacher::class, 'id_faculty');
    }
}
