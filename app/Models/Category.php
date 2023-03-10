<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'slug',
        'desc',
        'image',
        'meta_title',
        'meta_desc',
    ];

    public function articles(): MorphToMany
    {
        return $this->morphedByMany(Article::class, 'categorizable');
    }

    public function portfolios(): MorphToMany
    {
        return $this->morphedByMany(Portfolio::class, 'categorizable');
    }



    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
