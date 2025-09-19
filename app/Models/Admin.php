<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    const ROLE_SUPERADMIN = 'superadmin';
    const ROLE_ADMIN = 'admin';

    protected $guarded = ['id'];


    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
