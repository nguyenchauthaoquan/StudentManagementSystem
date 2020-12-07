<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Group extends Pivot
{
    use HasFactory;

    protected $table = 'groups';
    protected $fillable = [
        'id_training', 'id_faculty',
        'name', 'date_admission', 'date_graduation'
    ];

    public function students() {
        return $this->belongsToMany(
            Major::class,
            'students',
            'id_group',
            'id_major'
        )->withTimestamps();
    }
}
