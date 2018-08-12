<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = ['text', 'title', 'user_id'];

    public function scopeOfKeyWord($query, $keyWord){

        return $query->where("title", "LIKE", "%$keyWord%")
                     ->orWhere("text", "LIKE", "%$keyWord%");
    }

    public function scopeOfAuthor($query, $userId){

        return $query->where("user_id", $userId);
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function comments(){

        return $this->hasMany('App\Comment');
    }

}
