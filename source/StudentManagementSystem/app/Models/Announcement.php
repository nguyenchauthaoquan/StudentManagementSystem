<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    public function faculties() {
        return $this->belongsToMany(
            Faculty::class,
            'faculties_announcements',
            'id_announcement',
            'id_faculty'
        );
    }
}
