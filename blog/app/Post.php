<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
  
    protected $fillable =['title','content','created','updated','tags'];
    // protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function saveTags(string $tags)
    {
    
        $tags = array_unique(array_filter(array_map(function($item) {
            return trim($item);

        },explode(',',$tags))));

        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name'=>$tag, 'slug'=> Str::slug($tag)]);
        }
       
        $tags = Tag::whereIn('name', $tags)->get()->pluck('id');
         
        $this->tags()->sync($tags);
        
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
