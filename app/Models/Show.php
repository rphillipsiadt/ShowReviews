<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'year',
        'episode_count',
        'image',
        'created_at',
        'updated_at'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
