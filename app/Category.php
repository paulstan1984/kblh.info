<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public function books()
    {
      return $this->belongsToMany('App\Book', 'books_categories', 'bookid', 'categoryid');
    }


    public static function search(Request $request){
        $items = Category::query();
                
        return $items;
    }
}
