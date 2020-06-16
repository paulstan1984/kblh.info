<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Author;

class AdminAuthorsController extends AdminBaseController
{
    public function index(Request $request)
    {
        $this->loadBlocks();
        $this->loadNotificationAndErrorMessages($request);

        $pagination = $this->getPagination($request);
        $query = Author::search($request);
        $this->data['results'] = $this->applyPagination($query, $pagination);
        
        return view('admin/authors/index', $this->data);
    }

    public function edit(Request $request, int $id = 0)
    {
        $this->loadBlocks();
        $this->data['id'] = $id;

        if($id!=0){
            $this->data['item'] = Author::find($id);
        }
        else{
            $this->data['item'] = new Author;
        }       
        
        return view('admin/authors/edit', $this->data);
    }

    public function save(Request $request,int $id = 0)
    {
        $item = null;
        
        if($id!=0){
            $item = Author::find($id);
        }
        
        $validatedData = $request->validate([
            'name' => ['required', 'max:200', Rule::unique('authors')->ignore($id)],
        ]);
            
        if($id==0 || $item == null){
            $item = new Author();
        } 
        
        $item->name = $validatedData['name'];
            
        $item->save();

        return redirect(env('R_ADMIN').'/authors?msg=infosaved');
    } 

    public function delete(Request $request, $id)
    {
        $item = Author::find($id);
        $item->delete(); 
        return redirect(env('R_ADMIN').'/authors?msg=infodeleted');
    }
}
