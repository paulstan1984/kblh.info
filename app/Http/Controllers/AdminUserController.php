<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\User;
use Exception;

class AdminUserController extends AdminBaseController
{
    public function index(Request $request)
    {
        $this->loadBlocks();
        $this->loadNotificationAndErrorMessages($request);

        $pagination = $this->getPagination($request);
        $query = User::search($request);
        $this->data['results'] = $this->applyPagination($query, $pagination);
        
        return view('admin/users/index', $this->data);
    }

    public function edit(Request $request, int $id = 0)
    {
        $this->loadBlocks();
        $this->data['id'] = $id;

        if($id!=0){
            $this->data['item'] = User::find($id);
        }
        else{
            $this->data['item'] = new User;
        }       
        
        return view('admin/users/edit', $this->data);
    }

    public function save(Request $request,int $id = 0)
    {
        $item = null;
        
        if($id!=0){
            $item = User::find($id);
        }
        
        $validatedData = $request->validate([
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore($id)],
            'role' => 'required',
        ]);
            
        if($id==0 || $item == null){
            $item = new User();
            $item->created_at = date('Y-m-d H:i:s');
            $item->password = '';
        } else{
            $item->updated_at = date('Y-m-d H:i:s');
        }
        
        $item->firstname = $validatedData['firstname'];
        $item->lastname = $validatedData['lastname'];
        $item->email = $validatedData['email'];
        $item->role = $validatedData['role'];
            
        $item->save();

        return redirect(env('R_ADMIN').'/users?msg=infosaved');
    } 

    public function delete(Request $request, $id)
    {
        $item = User::find($id);
        $item->delete(); 
        return redirect(env('R_ADMIN').'/users?msg=infodeleted');
    }

    public function changepassword(Request $request, int $id = 0)
    {
        $this->loadBlocks();
        $this->data['id'] = $id;

        if($id!=0){
            $this->data['item'] = User::find($id);
        }
        else{
            return redirect(env('R_ADMIN').'/users?msg=selectanuser');
        }       
        
        return view('admin/users/changepassword', $this->data);
    }

    public function savepassword(Request $request,int $id = 0)
    {
        $item = null;
        
        if($id==0){
            return redirect(env('R_ADMIN').'/users?msg=selectanuser');
        }
        
        $validatedData = $request->validate([
            'password' => 'required|max:20',
            'repassword' => 'required|max:20|same:password',
        ]);
            
        $item = User::find($id);
        $item->updated_at = date('Y-m-d H:i:s');
        $item->password = User::hashPassword($validatedData['password']);
            
        $item->save();

        return redirect(env('R_ADMIN').'/users?msg=infosaved');
    } 
}
