<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Tag;
use App\Like;
use App\ArticleImg;

use App\Http\Requests\ArticleRequest;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Attribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;
use function Psy\debug;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    //記事一覧ページの表示アクションメソッド
    public function index(User $user)
    {
        //allメソッドでモデルの全データをコレクションで返す。
        $articles = Article::orderBy('created_at', 'desc')->paginate(9);
        $user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);
        $auth_user = Auth::user();

        // アクションメソッドの第一引数には、ビューファイル名を渡す。第2引数には、ビューファイルに渡す変数の名称と、その変数の値を連想配列型式で指定する。
        // キーを定義することでビューファイル側で$articleという変数が使用できる
        return view('articles.index', [
            'articles' => $articles,
            'user' => $user,
            'users'  => $users,
            'auth_user' => $auth_user,
        ]);
    }

    public function likeIndex()
    {

        $user = Auth::user();
        $auth_user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);
        $articles = Article::withCount('likes')->orderBy('likes_count', 'desc')->paginate(9);

        return view('articles.indexLikes', [
            'user' => $user,
            'auth_user' => $auth_user,
            'articles' => $articles,
            'users'  => $users,
            ]);
    }

    public function card_side()
    {
        $user = Auth::user();
        $articles = Article::withCount('likes')->orderBy('likes_count', 'desc');
        return view('articles.card_side', [
            'user' => $user,
            'articles' => $articles
            ]);
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });
        $user = Auth::user();
        $auth_user = Auth::user();


        return view('articles.create', [
            'allTagNames' => $allTagNames,
            'user' => $user,
            'auth_user' => $auth_user,
        ]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        Log::debug('<<< store >>>>');
        Log::debug('<<< $request >>>>');
        Log::debug($request);

        $article->user_id = $request->user()->id;
        $article->save();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $tagNames = $article->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });
        $user = Auth::user();
        $auth_user = Auth::user();



        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
            'user' => $user,
            'auth_user' => $auth_user,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        Log::debug('<<< update >>>>');
        Log::debug('<<< $request >>>>');
        Log::debug($request);
        $article->fill($request->all());
        $article->save();

        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        //不要な画像削除する
        $files_storage = Storage::files('public/article_imgs');
        $files_DB = ArticleImg::select('path')->get();
        LOG::debug('$files_storage');
        LOG::debug($files_storage);
        LOG::debug('$files_DB');
        LOG::debug($files_DB);


        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $user = Auth::user();
        $auth_user = Auth::user();
        $articles = Article::withCount('likes')->orderBy('likes_count', 'desc')->paginate(9);

        Log::debug('$article');
        Log::debug($article);
        Log::debug($article->uesr);
        return view('articles.show', [
            'article' => $article,
            'user' => $user,
            'auth_user' => $auth_user,
            'articles' => $articles,
        ]);
    }

    public function detail(Article $article)
    {
        $user = Auth::user();
        return view('articles.detail', [
            'article' => $article,
            'user' => $user,
        ]);
    }

    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);
        $auth_user = Auth::user();

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
            'auth_user' => $auth_user,
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function ajaxImgUpload(Request $request)
    {
        Log::debug('<<<<<<<< imgupload ajax>>>>>>>>>>>>>');

        $Articleimg = new ArticleImg;
        $Articleimg->article_id = $request->article_id;
        $Articleimg->path = $request->file;
        $path = $request->file->store('public/article_imgs');
        $Articleimg->path = str_replace('public/', '', $path);

        $Articleimg->save();

        return response()->json($Articleimg->path);
    }
}
