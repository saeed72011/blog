<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'alt',
        'photoable_id',
        'photoable_type'
    ];

    public function photoable(): MorphTo
    {
        return $this->morphTo();
    }
}
