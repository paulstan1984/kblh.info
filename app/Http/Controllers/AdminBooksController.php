<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Book;
use App\BookSection;

class AdminBooksController extends AdminBaseController
{
    public function index(Request $request)
    {
        $this->loadBlocks();
        $this->loadNotificationAndErrorMessages($request);

        $pagination = $this->getPagination($request);
        $query = Book::search($request);
        $this->data['results'] = $this->applyPagination($query, $pagination);
        
        return view('admin/books/index', $this->data);
    }

    public function edit(Request $request, int $id = 0)
    {
        $this->loadBlocks();
        $this->data['id'] = $id;

        if($id!=0){
            $this->data['item'] = Book::find($id);
        }
        else{
            $this->data['item'] = new Book;
        }       
        
        return view('admin/books/edit', $this->data);
    }

    public function save(Request $request,int $id = 0)
    {
        $item = null;
        
        if($id!=0){
            $item = Book::find($id);
        }
        
        $validatedData = $request->validate([
            'title' => ['required','max:100',Rule::unique('books')->ignore($id)],
            'description' => 'required',
        ]);
            
        if($id==0 || $item == null){
            $item = new Book();
            $item->created_at = date('Y-m-d H:i:s');
        } else{
            $item->updated_at = date('Y-m-d H:i:s');
        }
        
        $item->title = $validatedData['title'];
        $item->description = $validatedData['description'];
            
        $item->save();

        return redirect(env('R_ADMIN').'/books?msg=infosaved');
    } 

    public function delete(Request $request, $id)
    {
        $item = Book::find($id);
        $item->delete(); 
        return redirect(env('R_ADMIN').'/books?msg=infodeleted');
    }


    public function editchapter(Request $request, int $bookid, int $id = 0, int $parentid)
    {
        $this->loadBlocks();
        $this->data['id'] = $id;

        $this->data['book'] = Book::find($bookid);
        $this->data['parentid'] = $parentid;

        if($id!=0){
            $this->data['item'] = BookSection::find($id);
        }
        else{
            $this->data['item'] = new BookSection;

            $this->data['item']->position = Book::getNextSectionPosition($bookid, $parentid);
        }       
        
        return view('admin/books/editchapter', $this->data);
    }

    public function savechapter(Request $request, int $bookid, int $id = 0, int $parentid)
    {
        $item = null;
        
        if($id!=0){
            $item = BookSection::find($id);
        }
        
        $validatedData = $request->validate([
            'title' => ['required','max:100'],
            'position' => ['required','numeric'],
            'description' => 'required',
        ]);
            
        if($id==0 || $item == null){
            $item = new BookSection();
            $item->created_at = date('Y-m-d H:i:s');
        } else{
            $item->updated_at = date('Y-m-d H:i:s');
        }

        $item->bookid = $bookid;
        $item->parentid = $parentid;
        $item->type = 'chapter';
        $item->title = $validatedData['title'];
        $item->position = $validatedData['position'];
        $item->description = $validatedData['description'];
            
        $item->save();

        return redirect(env('R_ADMIN').'/books/edit/'.$bookid.'?msg=infosaved');
    } 

    public function deletechapter(Request $request, $bookid, $id)
    {
        $item = BookSection::find($id);
        $item->delete(); 
        return redirect(env('R_ADMIN').'/books/edit/'.$bookid.'?msg=infodeleted');
    }

    public function sectionmoveup(Request $request, $id)
    {
        $item = BookSection::moveup($id);
        return redirect(env('R_ADMIN').'/books/edit/'.$item->bookid);
    }

    public function sectionmovedown(Request $request, $id)
    {
        $item = BookSection::movedown($id);
        return redirect(env('R_ADMIN').'/books/edit/'.$item->bookid);
    }
}
