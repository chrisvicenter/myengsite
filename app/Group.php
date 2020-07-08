<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
