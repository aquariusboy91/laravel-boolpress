<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'created_up',
        'updated_at'
    ];


public function boolpresses()
 {
    return $this-> hasMany('App\Model\Boolpress');
}

}