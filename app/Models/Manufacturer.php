<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public function assets()
    {
        return $this->hasMany(Asset::class, 'manufacture_id');
    }
}
