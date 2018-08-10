<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = ['text', 'title', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

}
