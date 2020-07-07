<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\User;
use App\Book;
use App\Author;

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
        $this->data['results'] = $this->applyPagination($query, $pagination);
        $this->data['results']->title = $request->get('title');

        return view('books', $this->data);
    }

    public function authors(Request $request)
    {
        $this->loadBlocks();

        $pagination = $this->getPagination($request);
        $query = Author::search($request);
        $this->data['results'] = $this->applyPagination($query, $pagination);
        $this->data['results']->name = $request->get('name');

        return view('authors', $this->data);
    }
}
