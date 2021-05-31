<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller {
    public function posts(Request $request){
        $category = $request->category;
        if($category == ""){
            $category = "scientific-technological";
        }
        else{
            $category = $request->category;
        } 
        $posts = Post::orderByRaw( 'created_at DESC' )->where('Category', '=', $category)->get();
        return view('/posts/index', compact('posts'));
    }
    public function deletePost($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('profile');
    }
    public function storePost(Request $request){      
        $id = $request->cookie('id');

        if($request->hasFile('img')){
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('img')->storeAs('public/img', $fileNameToStore);
        } else{
            $fileNameToStore = '';
        }

        $post = new Post();
        $post->Title = $request->Title;
        $post->Description = $request->Description;
        $post->Img = $fileNameToStore;
        $post->Category = $request->Category;
        $post->User_id = $id;
        $post->save();
        return redirect('home');
    }
    public function showPost($postId){
        $post = Post::find($postId);
        return view('/posts/update', compact('post'));
    }
    public function updatePost(Request $request){
        if($request->hasFile('img')){
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('img')->storeAs('public/img', $fileNameToStore);
        } else{
            $fileNameToStore = '';
        }
        
        $post=Post::find($request->id);
        $post->Title=$request->postTitle;
        $post->Description=$request->postDescription;
        $post->Img=$fileNameToStore;
        $post->save();
        return redirect('profile');
    }
    public function bestPost(){
        $post = Post::join('interests', 'posts.id', '=', 'Post_Id')
        ->join('users', 'users.id', '=', 'posts.User_id')
        ->selectRaw('SUM(Interested) AS allInterests , posts.Title, posts.Description, posts.Category, posts.Img, Post_Id,  name')
        ->groupBy('interests.Post_Id')
        ->orderByRaw('allInterests DESC')
        ->take(1)
        ->get();
        return view('welcome', compact('post'));
    }
}
