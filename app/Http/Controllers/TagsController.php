<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;  
class TagsController extends Controller
{
    
    public function index(){
        $tags = Tag::orderBy('id', 'desc')->paginate(30);
        return view('tags.index', [
            'tags' => $tags,
        ]);
    }
    
    public function show($id){
        $tag = Tag::find($id);
        $posts = $tag->posts()->paginate(30);
        
        $data = [
            'tag' => $tag,
            'posts' => $posts,
            ];
        return view('tags.show', $data);
    }
}
