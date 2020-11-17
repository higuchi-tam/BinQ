<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TagController extends Controller
{
    public function __construct()
    {
        $this->sidebarArticles = Article::withCount('likes')->orderBy('likes_count', 'desc')->where('open_flg', 0)->take(5)->get();
        $this->sidebarUsers = User::withCount('followers')->orderBy('followers_count', 'desc')->take(5)->get();
    }

    public function show(string $name)
    {
        $tag = Tag::where('name', $name)->first();
        $user = Auth::user();
        $auth_user = Auth::user();

        $tags = Tag::all();

        return view('tags.show', [
            'user' => $user,
            'auth_user' => $auth_user,
            'tag' => $tag,
            'tags' => $tags,
            'sidebarArticles' => $this->sidebarArticles,
            'sidebarUsers' => $this->sidebarUsers,
        ]);
    }
}
