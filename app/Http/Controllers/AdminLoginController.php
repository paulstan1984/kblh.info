<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminLoginCheck;
use App\User;
use Illuminate\Http\Request;
use App\Rules\ValidateUsernamePassword;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        return view('admin/login');
    }

    public function dologin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|max:100|email',
            'password' => ['required', new ValidateUsernamePassword($request)],
        ]);
        
        $password = md5($validatedData['password'].env('hash_key'));
        $loggedInUser = User::where('email', $validatedData['email'])
                ->where('password', $password)
                ->first();
        
        if(!empty($loggedInUser)){
            session([AdminLoginCheck::AdminIdKey => $loggedInUser->id]);
            return redirect(env('R_ADMIN'));
        }
        
        return redirect(env('R_ADMIN_LOGIN'));
    }
}
