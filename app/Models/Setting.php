<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'logo',
        'image',
        'video',
        'phone',
        'mobile',
        'city',
        'address',
        'email',
        'opens',
        'closes',
        'index',
        'favicon',
        'title',
        'meta_title',
        'desc',
        'meta_desc',
        'about',
        'latitude',
        'longitude',
        'about',
    ];
}
