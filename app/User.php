<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    

    public static function getDashBoardCounters(){
        $counters = (object)[
            'nrUsers' => DB::table('users')->count(),
            'nrAuthors' => DB::table('authors')->count(),
            'nrBooks' => DB::table('books')->count(),
            'nrCategories' => DB::table('categories')->count(),
        ];

        return $counters;
    }

    public static function getPublicCounters(){
        $counters = (object)[
            'nrAuthors' => DB::table('authors')->count(),
            'nrBooks' => DB::table('books')->count(),
            'nrCategories' => DB::table('categories')->count(),
        ];

        return $counters;
    }
    
    public static function search(Request $request){
        $items = User::query();
                
        return $items;
    }

    public static function hashPassword(string $plainPassword) {
        return md5($plainPassword.env('hash_key'));
    }
}
