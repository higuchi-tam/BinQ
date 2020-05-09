<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentsController extends Controller
{
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        Log::debug('<<<<  comment store  >>>>>>');
        Log::debug('request');
        Log::debug($request);
        Log::debug('$id');
        Log::debug($id);


        // Commentモデル作成
        $comment = new Comment;
        $comment->comment = $request->comment;
        // $comment->article_id = $request->article_id;
        $comment->article_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        Log::debug('<<<<  comment update  >>>>>>');
        Log::debug('request');
        Log::debug($request);

        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        Log::debug('<<<<  comment destroy  >>>>>>');
        Log::debug('request');
        Log::debug($request);

        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
