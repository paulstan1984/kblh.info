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
        $this->loadNotificationAndErrorMessages($request);
        return view('admin/login', $this->data);
    }

    public function dologin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|max:100|email',
            'password' => ['required', new ValidateUsernamePassword($request)],
        ]);
        
        $password = User::hashPassword($validatedData['password']);

        $loggedInUser = User::where('email', $validatedData['email'])
                ->where('password', $password)
                ->first();
        
        if(!empty($loggedInUser)){
            session([AdminLoginCheck::AdminIdKey => $loggedInUser->id]);
            return redirect(env('R_ADMIN').'?msg=welcome');
        }
        
        return redirect(env('R_ADMIN_LOGIN').'?msg=invalidcredentials');
    }

    public function logout(){
        session([AdminLoginCheck::AdminIdKey => null]);
        return redirect(env('R_ADMIN_LOGIN'));
    }
}
