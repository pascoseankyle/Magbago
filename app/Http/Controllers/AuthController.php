<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Crypt;
use DB;
class AuthController extends Controller
{
    public function login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $userPassword = User::select('id' , 'password', 'email', 'img')->where('email', '=', $email)->get(); 
        if(count($userPassword) > 0){
            $i = 0;
            foreach($userPassword as $userpass) { 
                $result[$i] = $userpass->password;
                $id = $resultId[$i] = $userpass->id;
                $photo = $resultPhoto[$i] = $userpass->img;
                $decryptPassword = Crypt::decryptString($result[$i]); 
                $i++;
            }
            if($decryptPassword == $password) { 
                $request->session()->forget('name');
                return redirect('profile')->withCookie(cookie('name', $email))
                ->withCookie(cookie('id', $id))
                ->withCookie(cookie('photo', $photo));
            }
            else{
                return redirect('login');
            }
        }
        else{
            return redirect('login');
        }
    }  
}
