<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Location extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'department_id',
        'location_name',
        'notes',
    ];

    public function user()
    {
        return $this->HasOne(User::class, 'location_id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function assets()
    {
        return $this->hasMany(Asset::class, 'location_id');
    }
}
