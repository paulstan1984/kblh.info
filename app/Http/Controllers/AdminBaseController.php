<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Middleware\AdminLoginCheck;
use Illuminate\Database\Eloquent\Builder;

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

    protected static function applyPagination(Builder $query, $pagination) {
        $pageSize = 10;

        $nrPages = ceil($query->count() / $pageSize) ;
        $query = $query->orderBy($pagination->orderBy, $pagination->orderByDir)
            ->skip(($pagination->page - 1) * $pageSize)
            ->take(10)
            ->get();

        return (object)[
            'nrPages' => $nrPages,
            'page'    => $pagination->page,
            'orderby' => $pagination->orderBy,
            'orderbydir' => $pagination->orderByDir,
            'results' => $query,
        ];
    }
}
