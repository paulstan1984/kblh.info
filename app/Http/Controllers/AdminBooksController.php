<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Book;
use App\BookSection;
use App\BookAuthor;

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
        $this->loadNotificationAndErrorMessages($request);
        $this->data['id'] = $id;
        $this->data['selected_section'] = $request->get('selected_section');

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
        $this->loadNotificationAndErrorMessages($request);
        $this->data['id'] = $id;
        $this->data['selected_section'] = $request->get('selected_section');
        $this->data['parents'] = BookSection::getParents($id);

        $this->data['book'] = Book::find($bookid);
        $this->data['parentid'] = $parentid;

        if($id!=0){
            $this->data['item'] = BookSection::find($id);
            $this->data['parentid'] = $this->data['item']->parentid;
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

        if($item->parentid==0){
            return redirect(env('R_ADMIN').'/books/edit/'.$item->bookid.'?msg=infosaved');
        } else {
            return redirect(env('R_ADMIN').'/books/'.$item->bookid.'/chapters/'.$item->parentid.'/0?msg=infosaved');
        }
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

        if($item->parentid==0){
            return redirect(env('R_ADMIN').'/books/edit/'.$item->bookid.'?selected_section='.$item->id);
        } else {
            return redirect(env('R_ADMIN').'/books/'.$item->bookid.'/chapters/'.$item->parentid.'/0?selected_section='.$item->id);
        }
    }

    public function sectionmovedown(Request $request, $id)
    {
        $item = BookSection::movedown($id);

        if($item->parentid==0){
            return redirect(env('R_ADMIN').'/books/edit/'.$item->bookid.'?selected_section='.$item->id);
        } else {
            return redirect(env('R_ADMIN').'/books/'.$item->bookid.'/chapters/'.$item->parentid.'/0?selected_section='.$item->id);
        }
    }

    public function assignauthor(Request $request, $id, $authorid){
        $item = BookAuthor::query() 
            ->where('bookid', '=', $id)
            ->where('authorid', '=', $authorid)
            ->first();

        if($item == null){
            $item = new BookAuthor();
            $item->bookid = $id;
            $item->authorid = $authorid;
            $item->save();
        }

        return redirect(env('R_ADMIN').'/books/edit/'.$item->bookid);
    }

    public function unassignauthor(Request $request, $id, $authorid){
        $item = BookAuthor::query() 
            ->where('bookid', '=', $id)
            ->where('authorid', '=', $authorid)
            ->first();

        if($item != null){
            BookAuthor::query() 
                ->where('bookid', '=', $id)
                ->where('authorid', '=', $authorid)
                ->delete();
        }

        return redirect(env('R_ADMIN').'/books/edit/'.$item->bookid);
    }

    public function search(Request $request)
    {
        $this->loadBlocks();
        $term = $request->get('term');
        $query = Book::search($request);
        $query = $query
            ->where('title', 'like', '%'.$term.'%')
            ->orderby('title')
            ->take(20)
            ->get();

        return $query;
    }
}
