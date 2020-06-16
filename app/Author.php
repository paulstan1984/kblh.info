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
    return $this->belongsToMany('App\Book', 'books_authors', 'bookid', 'authorid');
  }

  public static function search(Request $request){
    $items = Author::query();
            
    return $items;
  }
}
