<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Crypt;
class UserController extends Controller
{
    //
    public function showUser($userId) {
        $user = User::find($userId);
        $user->password = Crypt::decryptString($user->password); 
        return view('/users/update', compact('user'));
    }
    public function updateUser(Request $request){
        $user=User::find($request->id);
        if($request->hasFile('img')){
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('img')->storeAs('public/img', $fileNameToStore);
        } else{
            $fileNameToStore = '';
        }
        $user->name=$request->userName;
        $user->email=$request->userEmail;
        $user->password=Crypt::encryptString($request->userPassword);
        $user->img=  strval($fileNameToStore);
        $user->save();
        return redirect('profile');
    }
    public function user(Request $request) {
        $id = $request->cookie('id');
        $user = User::where('id', '=', $id)->get();
        $posts = Post::where('User_id', '=', $id)->get();
        return view('/users/profile', compact('user', 'posts'));
    }
    public function signup(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required'
        ]);
        if($request->hasFile('img')){
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('img')->storeAs('public/img', $fileNameToStore);
        } else{
            $fileNameToStore = '';
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->img = $fileNameToStore;
        $user->password = Crypt::encryptString($request->password);
        $user->save();
        return redirect('welcome');
    }
}
