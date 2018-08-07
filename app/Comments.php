<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
   protected $table = 'comments';

   protected $fillable = ['text', 'article_id', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function article(){
        return $this->belongsTo('App\Articles');
    }
}
