<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends AdminBaseController
{
    public function index(Request $request)
    {
        $this->loadBlocks();
        
        return view('admin/index', $this->data);
    }

    
}
