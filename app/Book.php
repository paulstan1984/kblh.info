<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $table = 'books';
  protected $primaryKey = 'id';
  
  public function authors()
  {
    return $this->belongsToMany('App\Author', 'books_authors', 'author_id', 'book_id');
  }

  public function chapters()
  {
    return $this->hasMany('App\BookSection', 'id', 'bookid')->where('parentid', 0);
  }
}
