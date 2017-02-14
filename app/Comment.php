<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'post_id'];

    public static function table($string)
    {
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function articles() {
        return $this->belongsTo('App\Comment');
    }


}