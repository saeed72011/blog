<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'mobile',
        'desc',
        'sort',
        'status',
        'position',
        'gender'
    ];

    const SIR = 'sir';
    const MIS = 'mis';

    const GENDER = [self::SIR, self::MIS];
    const GENDER_FA = [self::SIR => 'آقا', self::MIS => 'خانوم'];
}
