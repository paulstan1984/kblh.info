<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Category;
use App\BookCategory;

class AdminCategoriesController extends AdminBaseController
{
    public function index(Request $request)
    {
        $this->loadBlocks();
        $this->loadNotificationAndErrorMessages($request);

        $pagination = $this->getPagination($request);
        $query = Category::search($request);
        $this->data['results'] = $this->applyPagination($query, $pagination);
        
        return view('admin/categories/index', $this->data);
    }

    public function edit(Request $request, int $id = 0)
    {
        $this->loadBlocks();
        $this->data['id'] = $id;

        if($id!=0){
            $this->data['item'] = Category::find($id);
        }
        else{
            $this->data['item'] = new Category;
        }       
        
        return view('admin/categories/edit', $this->data);
    }

    public function save(Request $request,int $id = 0)
    {
        $item = null;
        
        if($id!=0){
            $item = Category::find($id);
        }
        
        $validatedData = $request->validate([
            'name' => ['required', 'max:200', Rule::unique('categories')->ignore($id)],
        ]);
            
        if($id==0 || $item == null){
            $item = new Category();
        } 
        
        $item->name = $validatedData['name'];
            
        $item->save();

        return redirect(env('R_ADMIN').'/categories?msg=infosaved');
    } 

    public function delete(Request $request, $id)
    {
        $item = Category::find($id);

        BookCategory::query() 
            ->where('categoryid', '=', $id)
            ->delete();

        $item->delete(); 
        return redirect(env('R_ADMIN').'/categories?msg=infodeleted');
    }

    public function search(Request $request)
    {
        $this->loadBlocks();
        $term = $request->get('term');
        $query = Category::search($request);
        $query = $query
            ->where('name', 'like', '%'.$term.'%')
            ->orderby('name')
            ->take(20)
            ->get();

        return $query;
    }
}
