<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Aws\Credentials\Credentials;
use Aws\S3\S3Client;
use App\Post;  
use App\Tag;  

class PostsController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')
        ->simplePaginate(10);
       
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
     public function create()
    {
        $post = new Post;
        if (\Auth::check()) {
            $user = \Auth::user();;
            if(\Auth::id() === $user->id){
                return view('posts.create', [
                    'post' => $post,
                ]);
            }else{
                return redirect('/');
            }
        }
    }
    
    public function store(Request $request){
        $tag = new Tag;
        $this->validate($request, [
            'image' => 'required',
            'content' => 'required',
        ]);
        
        $image = $request->image;
        // list(, $fileData) = explode(';', $image);
        // list(, $fileData) = explode(',', $image);
        // $fileData = base64_decode($fileData);
        $image_name= time().'.jpg';
        // 保存するパスを決める
        $public_path = public_path('storage/upload/'.$image_name);
        $path = 'upload/'. $image_name;
        
        $img = Image::make($image)
                ->backup()
                ->resize(650, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($public_path,100);
        
        // AWS S3 に保存する
        Storage::disk('s3')->put($path, $img->encode(), 'public');
        
       
        $new_post =$request->user()->posts()->create([
            'content' => $request->content,
            'image_url' => $path,
        ]);
        
        if($request->tag != null){
        $keyword = mb_convert_kana($request->tag, 's','utf-8'); 
        $tag_names = preg_split('/\s+/', $keyword);
        $tag_ids = [];
        foreach ($tag_names as $tag_name) {
            $tag = Tag::firstOrCreate([
                'tag_name' => $tag_name,
            ]);
            $tag_ids[] = $tag->id;
        }
        
        // 中間テーブル
        $new_post->tags()->sync($tag_ids);
        // $tag->posts()->sync($post_id);   
        };
        
    }
    
    
    
    public function show($id){
        $post = Post::find($id);
        $user = $post->user();
        $comments = $post->comments();
        $data = [
            'post' => $post,
            'user' => $user,
            'comments' => $comments,
            ];
        return view('posts.show', $data);
    }
    
    public function timeline(){
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->feed_posts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        return view('timeline', $data);
    }
}
