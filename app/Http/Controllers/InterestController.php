<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interest;
use DB;
class InterestController extends Controller
{
    //
    public function storeInterest($postId, Request $request){
        $id = $request->cookie('id');
        $interest = new Interest();
        $interest->User_Id = $id;
        $interest->Post_Id = $postId;
        $interest->interested = 1;
        $interest->save();
        return redirect('home');
    }

    public function deleteInterest($postId, Request $request){
        $id = $request->cookie('id');
        DB::table('interests')->where('Post_Id', $postId)->where('User_Id', $id)->delete(); 
        return redirect('interest');
    }

    public function interest(Request $request){
        $id = $request->cookie('id');
        $interest = Interest::join('posts', 'posts.id', '=', 'interests.Post_Id')
        ->join('users', 'users.id', '=', 'interests.User_Id')
        ->select('posts.id', 'posts.Title', 'interests.created_at', 'posts.Img')
        ->where('users.id', '=', $id)
        ->orderBy('interests.created_at', 'DESC')
        ->get();
        return view('interests/interest',compact('interest'));
    }
}
