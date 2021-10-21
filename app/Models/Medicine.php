<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'name',
        'details',
        'price',
        'selling_price',
        'quantity',
        'supplier_id',
        'type_id',
        'unit_id',
        'category_id',
        'measurement',
        'is_active',
        'barcode_number',
        'photo',
        'photo_uploaded_at',
        'is_prescribed',
        'expired_at'
    ];

    protected $casts = [
        'price' => 'double',
        'photo_uploaded_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

    /**
     * Relationship Methods
    */

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function medicineType()
    {
        return $this->belongsTo(MedicineType::class, 'type_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

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

    public function getIsPrescribedLabelAttribute()
    {
        switch ($this->attributes['is_prescribed']) {
            case 0:
                return '';
                break;

            case 1:
                return '<i class = "bi bi-check-lg text-success"></i>';
                break;
        }
    }

    public function getFilenameAttribute()
    {
        return $this->attributes['uuid'] . '.pdf';
    }

    public function getFilepathAttribute()
    {
        return implode('/', [
            'barcodes',
            $this->filename
        ]);
    }

    public function getIsPrescribedAttribute()
    {
        return $this->attributes['is_prescribed'] == 1;
    }
}
