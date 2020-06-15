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
        $query = User::search($request);
        $this->data['results'] = $this->applyPagination($query, $pagination);
        
        return view('admin/users/index', $this->data);
    }

    public function addedit(Request $request, int $id)
    {
        $this->loadBlocks();
        $this->data['id'] = $id;

        
        return view('admin/users/edit', $this->data);
    }

    public function delete(Request $request, $id)
    {
        return redirect(env('R_ADMIN').'/users');
    }
}
