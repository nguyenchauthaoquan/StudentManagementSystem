<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $fillable = [
        'name', 'date_admission', 'date_graduation'
    ];

    public function students() {
        return $this->hasMany(Student::class, 'id_group');
    }
}
