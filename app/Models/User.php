<?php

namespace App\Models;

use App\Traits\HasRole;
use App\Traits\HasUuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuid, HasRole;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship Methods
     */

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * Accessor Methods
     */

    public function getFullNameAttribute()
    {
        return implode(', ', [
            $this->attributes['last_name'],
            $this->attributes['first_name'],
        ]);
    }

    public function getNameAttribute()
    {
        return strtoupper(implode(' ', [
            $this->attributes['first_name'],
            $this->attributes['last_name'],
        ]));
    }

    public function getLogNameAttribute()
    {
        return ucwords(strtolower($this->name));
    }
}
