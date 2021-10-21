<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Accessor Methods
     */

    public function getIsActiveAttribute()
    {
        return $this->attributes['is_active'] == 0;
    }

    public function getStatusAttribute()
    {
        switch ($this->attributes['is_active']) {
            case 0:
                return '<span class="badge rounded-pill bg-success">Active</span>';
                break;

            case 1:
                return '<span class="badge rounded-pill bg-danger">Inactive</span>';
                break;
        }
    }
}
