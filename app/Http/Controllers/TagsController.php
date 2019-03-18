<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;  
class TagsController extends Controller
{
    
    public function index(){
        $tags = Tag::all();
        return view('tags.index', [
            'tags' => $tags,
        ]);
    }
    
    public function show($id){
        $tag = Tag::find($id);
        $posts = $tag->posts()->paginate(50);
        
        $data = [
            'tag' => $tag,
            'posts' => $posts,
            ];
        return view('tags.show', $data);
    }
}
