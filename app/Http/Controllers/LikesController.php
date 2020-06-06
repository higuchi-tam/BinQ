<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\Article;
use App\Comment;
use App\User;
use Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LikesController extends Controller
{
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
        $this->sidebarArticles = Article::withCount('likes')->orderBy('likes_count', 'desc')->where('open_flg', 0)->take(5)->get();
        $this->sidebarUsers = User::withCount('followers')->orderBy('followers_count', 'desc')->take(5)->get();
    }

    public function store(Request $request)
    {
        // Likeモデル作成
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
        return redirect('/');
    }

    public function articles($id)
    {
        $article = Article::find($id);
        $like_users = $article->likes()->get();
        $auth_user = Auth::user();

        return view('likes.articles', [
            'article' => $article,
            'like_users' => $like_users,
            'auth_user' => $auth_user,
            //サイドバー用
            'sidebarArticles' => $this->sidebarArticles,
            'sidebarUsers' => $this->sidebarUsers,
        ]);
    }
    public function comments($id)
    {
        $comment = Comment::find($id);
        $like_users = $comment->likes()->get();
        $auth_user = Auth::user();

        return view('likes.comments', [
            'comment' => $comment,
            'like_users' => $like_users,
            'auth_user' => $auth_user,
            //サイドバー用
            'sidebarArticles' => $this->sidebarArticles,
            'sidebarUsers' => $this->sidebarUsers,
        ]);
    }
}
