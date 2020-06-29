<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    var $data = [];

    protected function loadBlocks(){
        $this->data = array_merge($this->data, array(
            'header' => view('blocks/header', $this->data)->render(),
            'footer' => view('blocks/footer', $this->data)->render()
        ));
    }
    
    protected function getPagination(Request $request){
        $pagination = [
            'page' => 1,
            'orderBy' => 'id',
            'orderByDir' => 'asc'
        ];
        
        if(!empty($request->get('page'))){
            $pagination['page'] = $request->get('page');
        }
        
        if(!empty($request->get('orderby'))){
            $pagination['orderBy'] = $request->get('orderby');
        }
        
        if(!empty($request->get('orderbydir'))){
            $pagination['orderByDir'] = $request->get('orderbydir');
        }
          
        return (object)$pagination;
    }

    protected function loadNotificationAndErrorMessages(Request $request){
        $this->data['msg'] = $request->get('msg');
        $this->data['errmsg'] = $request->get('errmsg');
    }
}
