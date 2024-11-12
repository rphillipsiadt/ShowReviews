<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
