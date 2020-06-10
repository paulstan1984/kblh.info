<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  protected $table = 'authors';
  protected $primaryKey = 'id';
  
  public function books()
  {
    return $this->belongsToMany('App\Book', 'books_authors', 'book_id', 'author_id');
  }
}
