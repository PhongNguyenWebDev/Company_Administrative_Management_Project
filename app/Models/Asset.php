<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'location_id',
        'condition_id',
        'notes',
        'manufacture_id',
        'model_id',
        'serial',
        'date',
        'warranty_months',
        'price',
        'supplier_id',
    ];

    // Define relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacture_id');
    }

    public function model()
    {
        return $this->belongsTo(ModelM::class, 'model_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Asset model
    // In your Asset model

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
