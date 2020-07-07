<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Middleware\AdminLoginCheck;

class AdminBaseController extends Controller
{
    public function __construct() {
        $this->middleware('admincheck', ['except'=>['login']]);
    }
 
    protected function loadBlocks(){

        $loggedInUserId = session(AdminLoginCheck::AdminIdKey);
        if(empty($loggedInUserId)){
            return redirect(env('R_ADMIN_LOGIN').'?msg=notloggedin');
        }
        
        $this->data['admin'] = User::find($loggedInUserId);

        $this->data = array_merge($this->data, array(
            'header' => view('admin/blocks/header', $this->data)->render(),
            'footer' => view('admin/blocks/footer', $this->data)->render(),
        ));
    }

}
