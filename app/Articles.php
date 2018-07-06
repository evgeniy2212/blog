<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    public function getArticles(){
        return DB::table('articles')
            ->get();
    }

    public function getArticleById($id){
        return DB::table('articles')
                    ->where('id', $id)
                    ->get();
    }
}
