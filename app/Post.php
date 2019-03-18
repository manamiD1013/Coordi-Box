<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ['content', 'user_id', 'image_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag', 'post_id', 'tag_id');
    }
    
    public function comments(){
         return $this->hasMany(Comment::class);
    }
    public function bookmark_user(){
        return $this->belongsToMany(User::class, 'bookmarks', 'post_id', 'user_id')->withTimestamps();
    }
    public function like_user(){
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
    }
}
