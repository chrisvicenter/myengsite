<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'unit_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class);
    }
}
