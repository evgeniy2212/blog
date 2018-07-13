<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('comments');
    }

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
