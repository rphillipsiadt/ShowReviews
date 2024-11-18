<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'description',
    ];
    
    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
