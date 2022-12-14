<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Author extends Model
{
  protected $table = 'authors';
  protected $primaryKey = 'id';
  public $timestamps = false;
  
  public function books()
  {
    return $this->belongsToMany('App\Book', 'books_authors', 'authorid', 'bookid');
  }

  public static function search(Request $request){
    $items = Author::query();

    if($request->get('name')){
      $items = $items->where('name', 'like', '%'.$request->get('name').'%');
    }
            
    return $items;
  }
}
