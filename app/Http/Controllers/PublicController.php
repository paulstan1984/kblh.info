<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\User;
use App\Book;
use App\Author;
use App\BookSection;
use App\Category;
use PDF;

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

        $pagination = $this->getPagination($request);
        $query = Book::search($request);

        $this->data['results'] = $this->applyPagination($query, $pagination, $this->pageSize);
        $this->data['results']->title = $request->get('title');
        $this->data['results']->category_id = $request->get('category_id');
        $this->data['results']->author_id = $request->get('author_id');

        $this->data['categories'] = Category::all();
        $this->data['authors'] = Author::all();

        return view('books', $this->data);
    }

    public function bookdetails(Request $request, int $id)
    {
        $this->loadBlocks();

        $this->data['id'] = $id;

        if($id!=0){
            $this->data['item'] = Book::find($id);
        }
        else{
            return redirect(env('R_BOOKS'));
        }       
        

        return view('bookdetails', $this->data);
    }

    public function bookpdf(Request $request, int $id){
        
        $this->data['id'] = $id;

        if($id!=0){
            $this->data['item'] = Book::find($id);
        }
        else{
            return redirect(env('R_BOOKS'));
        }   

        //aici: download chapter only
        PDF::setOptions(['dpi' => 300, 'defaultFont' => 'Open Sans']);
        $pdf = PDF::loadView('bookpdf', $this->data);
        return $pdf->download($this->data['item']->title . '.pdf');
    }

    public function chapterpdf(Request $request, int $id){
        
        $this->data['id'] = $id;

        if($id!=0){
            $this->data['item'] = BookSection::find($id);
        }
        else{
            return redirect(env('R_BOOKS'));
        }   

        //aici: download chapter only
        PDF::setOptions(['dpi' => 300, 'defaultFont' => 'Open Sans']);
        $pdf = PDF::loadView('chapterpdf', $this->data);
        return $pdf->download($this->data['item']->title . '.pdf');
    }

    public function authors(Request $request)
    {
        $this->loadBlocks();

        $pagination = $this->getPagination($request);
        $query = Author::search($request);
        $this->data['results'] = $this->applyPagination($query, $pagination, $this->pageSize);
        $this->data['results']->name = $request->get('name');

        return view('authors', $this->data);
    }
}
