<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookSection extends Model
{
  protected $table = 'book_sections';
  protected $primaryKey = 'id';
  
  public function subsections()
  {
    return $this->hasMany('App\BookSection', 'id', 'parentid');
  }

  public static function moveup(int $id){
    $book = BookSection::find($id);
    $prev = BookSection::query()
      ->where('bookid', $book->bookid)
      ->where('parentid', $book->parentid)
      ->where('position', '<', $book->position)
      ->orderby('position', 'desc')
      ->take(1)
      ->get()
      ->first();

    if($book != null && $prev != null){
      $auxPos = $book->position;
      $book->position = $prev->position;
      $prev->position = $auxPos;

      $book->save();
      $prev->save();
    }

    return $book;
  }

  public static function movedown(int $id){
    $book = BookSection::find($id);
    $next = BookSection::query()
      ->where('bookid', $book->bookid)
      ->where('parentid', $book->parentid)
      ->where('position', '>', $book->position)
      ->orderby('position', 'asc')
      ->take(1)
      ->get()
      ->first();

    if($book != null && $next != null){
      $auxPos = $book->position;
      $book->position = $next->position;
      $next->position = $auxPos;

      $book->save();
      $next->save();
    }

    return $book;
  }
}
