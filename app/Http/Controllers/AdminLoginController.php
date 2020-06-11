<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        return view('admin/login');
    }

    public function dologin(Request $request)
    {
        
    }
}
