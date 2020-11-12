<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $dateFormat = 'd/m/Y';
    protected $fillable = ['name'];

    public function users() {
        return $this->belongsToMany(
            User::class,
            'users_roles',
            'id_role',
            'id_user'
        );
    }
}
