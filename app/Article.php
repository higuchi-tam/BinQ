<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'open_flg'
    ];

    public function user(): BelongsTo
    {
        //記事と記事を書いたユーザ＝は多対1の関係なのでその場合は「belongsTo」メソッドを使用する。
        return $this->belongsTo('App\User');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool) $this->likes->where('id', $user->id)->count()
            : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function articleLikes(): BelongsToMany
    {
        return $this->belongsToMany('App\Like')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
