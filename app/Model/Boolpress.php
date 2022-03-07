<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Boolpress extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category() {

        return $this->belongsTo('App\Model\Category');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function createSlug($title)
    {
        $slug = Str::slug($title, '-');

        $oldPost = Post::where('slug', $slug)->first();

        $counter = 0;
        while ($oldPost) {
            $newSlug = $slug . '-' . $counter;
            $oldPost = Post::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }

    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag');
    }
}
