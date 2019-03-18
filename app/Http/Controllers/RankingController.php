<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;  
use App\Tag;  
use App\User;
class RankingController extends Controller
{
    public function new_ranking(){
        $data = [];
        $posts = Post::orderBy('created_at', 'desc')->take(6)->get();
        $post_ranking = Post::withCount('like_user')->orderBy('like_user_count', 'desc')->take(6)->get();
        $user_ranking = User::withCount('followers')->orderBy('followers_count', 'desc')->take(5)->get();
        $tag_ranking = Tag::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        
        $data = [
                'posts' => $posts,
                'post_ranking' => $post_ranking,
                'user_ranking' => $user_ranking,
                'tag_ranking' => $tag_ranking,
            ];
        return view('welcome', $data);
    }
    
    public function new_post(){
        $posts = Post::orderBy('created_at', 'desc')->take(50)->get();
        $data = [];
        $data = [
                'posts' => $posts,
            ];
        return view('posts.new', $data);
    }
    
    public function ranking(){
        $post_ranking = Post::withCount('like_user')->orderBy('like_user_count', 'desc')->take(50)->get();
        $data = [];
        $data = [
                'posts' => $post_ranking,
            ];
        return view('posts.ranking', $data);
    }
    
}
