<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // 「１対１」→ メソッド名は単数形
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
}
