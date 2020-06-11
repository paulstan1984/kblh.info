<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends AdminBaseController
{
    public function index(Request $request)
    {
        return view('admin/index');
    }
}
