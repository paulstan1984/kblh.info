<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


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
    return $this->hasMany('App\BookSection', 'bookid', 'id')
      ->where('parentid', 0)
      ->orderby('position');
  }

  public static function search(Request $request)
  {
    $items = Book::query();

    if ($request->get('title')) {

      $keyword = $request->get('title');

      $items = $items->where(
        function ($query) use ($keyword) {
          $query->where('title', 'like', '%' . $keyword . '%')
            ->orwhere('description', 'like', '%' . $keyword . '%');
        }
      );
    }

    if ($request->get('category_id')) {
      $category_id = $request->get('category_id');
      if (!empty($category_id)) {
        $items = $items->whereHas('categories', function (Builder $query) use ($category_id) {
          $query->where('categoryid', '=', $category_id);
        });
      }
    }

    if ($request->get('author_id')) {
      $author_id = $request->get('author_id');
      if (!empty($author_id)) {
        $items = $items->whereHas('authors', function (Builder $query) use ($author_id) {
          $query->where('authorid', '=', $author_id);
        });
      }
    }

    return $items;
  }

  public static function getNextSectionPosition(int $bookid, int $parentid)
  {
    return BookSection::query()
      ->where('bookid', $bookid)
      ->where('parentid', $parentid)
      ->max('position') + 1;
  }
}
