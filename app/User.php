<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'uid', 'icon_url', 'introduce' ,'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function bookmarks(){
        return $this->belongsToMany(Post::class, 'bookmarks', 'user_id', 'post_id')->withTimestamps();
    }
    
    public function likes(){
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;
    
        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;
    
        if ($exist && !$its_me) {
            // 既にフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function feed_posts()
    {
        $follow_user_ids = $this->followings()->pluck('users.id')->toArray();
        return Post::whereIn('user_id', $follow_user_ids);
    }
    
    public function bookmark($bookmarkId){
        //既にお気に入りしているかの確認
        $exist = $this->is_bookmarks($bookmarkId);
        if($exist){
            return false;
        }else{
            $this->bookmarks()->attach($bookmarkId);
            return true;
        }
    }
    public function unbookmark($bookmarkId){
         //既にお気に入りしているかの確認
        $exist = $this->is_bookmarks($bookmarkId);
        // お気に入りをしていればお気にいりを外す
        if($exist){
            $this->bookmarks()->detach($bookmarkId);
            return true;
        }else{
            return false;
        }
    }
    
    public function is_bookmarks($bookmarkId){
        return $this->bookmarks()->where('post_id', $bookmarkId)->exists();
    }
    
    public function like($likeId){
        //既にお気に入りしているかの確認
        $exist = $this->is_likes($likeId);
        if($exist){
            return false;
        }else{
            $this->likes()->attach($likeId);
            return true;
        }
    }
    public function unlike($likeId){
         //既にお気に入りしているかの確認
        $exist = $this->is_likes($likeId);
        // お気に入りをしていればお気にいりを外す
        if($exist){
            $this->likes()->detach($likeId);
            return true;
        }else{
            return false;
        }
    }
    
    public function is_likes($likeId){
        return $this->likes()->where('post_id', $likeId)->exists();
    }
}
