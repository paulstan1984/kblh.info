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
}
