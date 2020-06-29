<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BookCategory extends Model
{
  protected $table = 'books_categories';
  public $timestamps = false;
}
