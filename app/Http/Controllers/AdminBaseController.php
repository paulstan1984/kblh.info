<?php

namespace App\Http\Controllers;

class AdminBaseController extends Controller
{
    public function __construct() {
        $this->middleware('admincheck', ['except'=>['login']]);
    }
 
    protected function loadBlocks(){
        $this->data = array_merge($this->data, array(
            'header' => view('admin/blocks/header', $this->data)->render(),
            'footer' => view('admin/blocks/footer', $this->data)->render()
        ));
    }
}
