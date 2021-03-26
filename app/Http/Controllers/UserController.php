<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request){
        session(['logged_in' => false]);
        $user = User::find(3);
        if($user->name == $request->name){
            if(hash_equals($user->password, md5($request->password))){
                session(['logged_in' => true]);
            }
        }
        return redirect()->back();
    }
}
