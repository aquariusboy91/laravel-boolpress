<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Boolpress extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'created_at',
        'updated_at',
    ];
}
