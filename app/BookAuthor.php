<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BookAuthor extends Model
{
  protected $table = 'books_authors';
  public $timestamps = false;
}
