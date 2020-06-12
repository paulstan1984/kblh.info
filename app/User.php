<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    

    public static function getDashBoardCounters(){
        $counters = (object)[
            'nrUsers' => DB::table('users')->count(),
            'nrAuthors' => DB::table('authors')->count(),
            'nrBooks' => DB::table('books')->count(),
            'nrCategories' => 0//DB::table('categories')->count(),
        ];

        return $counters;
    }
}
