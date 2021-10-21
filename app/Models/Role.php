<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    const ADMIN = 1;
    const STAFF = 2;

    protected $fillable = [
        'name',
    ];

    /**
     * Relationship Methods
     */

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
