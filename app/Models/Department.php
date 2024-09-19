<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'department_name',
        'floor',
        'unit',
        'building',
        'street_address',
        'city',
        'state',
        'country',
        'zip_code',
    ];

    public function location()
    {
        return $this->HasMany(Location::class, 'department_id');
    }
}
