<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $table = 'majors';
    protected $fillable = [
        'name'
    ];

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'id_faculty');
    }

    public function students() {
        return $this->belongsToMany(
            Group::class,
            'students',
            'id_major',
            'id_group'
        )->withTimestamps();
    }
}
