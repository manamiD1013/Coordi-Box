<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(30);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'posts' => $posts,
            ];
        
        $data += $this->counts($user);
        return view('users.show', $data);
    }
    
    public function edit($id)
    {
        
       $user = User::find($id);
        if(\Auth::id() === $user->id){
            return view('users.edit',[
                'user' => $user,
            ]);
        }else{
            return redirect('/');
        }
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);  // これを最初に持ってくる
        $this->validate($request, [
            'name' => 'string|min:5|max:255',
            'uid' => "string|min:4|max:30|unique:users,uid,{$user->id}",
        ]);
        // dd($user);
        if(\Auth::id() === $user->id){
            $image_name= $user->id.'.png';
            $path = 'icons/'. $image_name; 
            $user->name = $request->name;
            $user->uid = $request->uid;
            $user->introduce = $request->introduce;
            $user->icon_url = $path;
            $user->save();
        }
        return back();
        
    }
    
    
    public function uploadUserIcon(Request $request)
    {
        $image = $request->image;
        $user = \Auth::user();
        $name = $user->id;
        list(, $fileData) = explode(';', $image);
        list(, $fileData) = explode(',', $image);
        $fileData = base64_decode($fileData);
        $image_name= $name.'.png';
        
        // 保存するパスを決める
        $path = 'icons/'. $image_name; 
        
        // AWS S3 に保存する
        Storage::disk('s3')->put($path, $fileData, 'public');
    
    }
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        return view('users.followers', $data);
    }
    
    public function bookmarks($id){
        $user = User::find($id);
        $posts = $user->bookmarks()->paginate(10);
        
        $data = [
            'user' => $user,
            'posts' => $posts,
            ];

        return view('users.bookmarks', $data);
    }
}
