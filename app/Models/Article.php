<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'author',
        'view',
        'study_time',
        'status',
        'image',
        'video',
        'slug',
        'meta_title',
        'meta_desc',
    ];



    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }


    public function comments(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->where('status', true);
    }

    public function published(): bool
    {
       return $this->attributes['status'] == true;
    }

    public function incrementCalculate(): bool|int
    {
        if (is_null($this->view)) {
          return  $this->update(['view' => 1]);
        } else {
            return $this->increment('view');
        }
    }
}
