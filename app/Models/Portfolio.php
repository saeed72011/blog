<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'desc',
        'status',
        'slug',
        'meta_title',
        'meta_desc',
    ];

    public function comments(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function photos(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function published(): bool
    {
        return $this->attributes['status'] == true;
    }


}
