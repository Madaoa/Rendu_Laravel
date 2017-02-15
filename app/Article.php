<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Conner\Likeable\LikeableTrait;

class Article extends Model
{
    use LikeableTrait;

    protected $fillable = ['title', 'content', 'user_id','filePath'];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
