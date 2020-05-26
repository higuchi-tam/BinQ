<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Validator;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $auth_user = Auth::user();
        $posts = Post::limit(10)
            ->orderBy('created_at', 'desc')
            ->get();

        //テンプレートのindex.blade.phpを表示します。
        return view('posts.index', [
            // 'posts' => $posts,
            'user' => $user,
            'auth_user' => $auth_user,
        ]);
    }

    public function new()
    {
        // テンプレート「post/new.blade.php」を表示します。
        return view('post/new');
    }

    public function store(Request $request)
    {
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all(), ['caption' => 'required|max:255', 'photo' => 'required']);

        //バリデーションの結果がエラーの場合
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // Postモデル作成
        $post = new Post;
        $post->caption = $request->caption;
        $post->user_id = Auth::user()->id;

        $post->save();

        $request->photo->storeAs('public/post_images', $post->id . '.jpg');

        // 「/」 ルートにリダイレクト
        return redirect('/');
    }

    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
        return redirect('/');
    }

    public function contents()
    {
        return view('post/contents');
    }

    public function contents_detail()
    {
        return view('post/contents_detail');
    }

    public function user()
    {
        return view('post/user');
    }
    public function user_detail()
    {
        return view('post/user_detail');
    }
}
