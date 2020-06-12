<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\User;

class AdminUserController extends AdminBaseController
{
    public function index(Request $request)
    {
        $this->loadBlocks();
        $pagination = $this->getPagination($request);
        
        $this->data['results'] = User::search($pagination);
        
        return view('admin/users/index', $this->data);
    }
}
