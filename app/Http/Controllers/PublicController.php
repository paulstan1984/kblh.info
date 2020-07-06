<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\User;

class PublicController extends Controller
{
    protected function loadBlocks(){

        $this->data = array_merge($this->data, array(
            'head' => view('blocks/head', $this->data)->render(),
            'header' => view('blocks/header', $this->data)->render(),
            'footer' => view('blocks/footer', $this->data)->render(),
        ));
    }

    public function index(Request $request)
    {
        $this->loadBlocks();

        $this->data['counters'] = User::getPublicCounters();
        
        return view('welcome', $this->data);
    }

    public function books(Request $request)
    {
        $this->loadBlocks();

        return view('books', $this->data);
    }
}
