<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelM extends Model
{
    use HasFactory;
    protected $table = 'models';
    protected $fillable = ['id', 'name'];
    public function assets()
    {
        return $this->hasMany(Asset::class, 'id');
    }
}
