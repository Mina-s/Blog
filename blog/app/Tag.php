<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Spatie\Tags\HasTags;

class Tag extends Model
{
    protected $guarded = [];
   
    public function posts()
    {
         return $this->belongsToMany(Post::class);
    }
}
