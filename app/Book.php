<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Book extends Model
{
  protected $table = 'books';
  protected $primaryKey = 'id';
  
  public function authors()
  {
    return $this->belongsToMany('App\Author', 'books_authors', 'bookid', 'authorid');
  }

  public function categories()
  {
    return $this->belongsToMany('App\Category', 'books_categories', 'bookid', 'categoryid');
  }

  public function chapters()
  {
    return $this->hasMany('App\BookSection', 'bookid', 'id')->where('parentid', 0);
  }

  public static function search(Request $request){
    $items = Book::query();
            
    return $items;
  }

  public static function getNextSectionPosition(int $bookid, int $parentid){
    return BookSection::query()
      ->where('bookid', $bookid)
      ->where('parentid', $parentid)
      ->max('position') + 1;
  }
}
