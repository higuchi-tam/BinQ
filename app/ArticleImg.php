<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ArticleImg extends Model
{

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

}
