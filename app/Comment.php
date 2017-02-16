<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'article_id'];

    public static function table($string)
    {
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function article() {
        return $this->belongsTo('App\Comment');
    }


}