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
        $userPassword = User::select('id' , 'password', 'email', 'img', 'type')->where('email', '=', $email)->get(); 
        if(count($userPassword) > 0){
            $i = 0;
            foreach($userPassword as $userpass) { 
                $result[$i] = $userpass->password;
                $id = $resultId[$i] = $userpass->id;
                $type = $t[$i] = $userpass->type;
                $decryptPassword = Crypt::decryptString($result[$i]); 
                $i++;
            }
            if($decryptPassword == $password){ 
                if($type===2){
                   $request->session()->forget('name');
                    return redirect('admin')
                    ->withCookie(cookie('type', $type))
                    ->withCookie(cookie('id', $id));
                }
                else {
                    $request->session()->forget('name');
                    return redirect('profile')
                    ->withCookie(cookie('type', $type))
                    ->withCookie(cookie('id', $id));
                }
            }
            else{
                return redirect('welcome');
            }
        }
        else{
            return redirect('welcome');
        }
    }  
}
