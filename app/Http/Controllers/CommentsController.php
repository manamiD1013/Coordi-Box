<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;  
use App\User; 
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $id)
    {
        if($request->comment != null){
           $request->user()->comments()->create([
            'comment' => $request->comment,
            'post_id' => $request->id,
         ]);
    }
      return redirect()->back();   
}
}