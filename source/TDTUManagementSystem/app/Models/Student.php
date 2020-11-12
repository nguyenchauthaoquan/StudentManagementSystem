<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'firstname', 'middlename', 'lastname',
        'birthday', 'place_of_birth', 'origin',
        'gender', 'phone', 'address', 'email',
        'religion', 'kin', 'id_number', 'place_of_id_number',
        'nationality', 'major', 'talents', 'date_of_union',
        'date_of_communist', 'date_of_student_union', 'date_of_dormitory',
        'room_of_dormitory'
    ];

    protected $casts = [
        'birthday' => 'date:d/m/Y',
        'date_of_union' => 'date:d/m/Y',
        'date_of_communist' => 'date:d/m/Y',
        'date_of_student_union' => 'date:d/m/Y',
        'date_of_dormitory' => 'date:d/m/Y',
        'created_at' => 'datetime:d/m/Y H:m:s',
        'updated_at' => 'datetime:d/m/Y H:m:s'
    ];

    public function group() {
        return $this->belongsTo(Group::class, 'id_group');
    }

    public function backgrounds() {
        return $this->hasMany(Background::class, 'id_student');
    }

    public function policies() {
        return $this->hasMany(Policy::class, 'id_student');
    }
}
