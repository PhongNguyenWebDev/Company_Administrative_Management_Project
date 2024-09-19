<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define the relationship with the Asset model
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
