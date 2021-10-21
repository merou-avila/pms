<?php

namespace App\Traits;

use App\Models\Role;
use Illuminate\Support\Str;

trait HasRole
{
    /**
     * Accessor Methods
     */

    public function getUserRole()
    {
        return $this->getAllRoles()->where('id', $this->role_id)->first();
    }

    public function getRoleAttribute()
    {
        return $this->getUserRole() ? $this->getUserRole()->name : null;
    }

    public function getRoleSlugAttribute()
    {
        return Str::slug($this->role);
    }

    /**
     * Unsorted Methods
     */

    public function hasRole()
    {
        $roles = func_get_args();

        return in_array($this->role_slug, $roles);
    }

    public function getAllRoles()
    {
        return cache()->rememberForever('all_roles', function () {
            return Role::all();
        });
    }
}
