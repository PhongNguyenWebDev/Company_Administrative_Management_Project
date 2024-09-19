<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'asset_id', 'file_name', 'file_path', 'mime_type', 'size',
    ];

    public function asset()
    {
        return $this->belongsToMany(Asset::class);
    }
}
