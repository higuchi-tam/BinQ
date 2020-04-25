<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Tag;
use App\Like;


use App\Http\Requests\ArticleRequest;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Attribute;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    //記事一覧ページの表示アクションメソッド
    public function index()
    {
        //allメソッドでモデルの全データをコレクションで返す。
        $articles = Article::all()->sortByDesc('created_at');
        $user = Auth::user();
        // アクションメソッドの第一引数には、ビューファイル名を渡す。第2引数には、ビューファイルに渡す変数の名称と、その変数の値を連想配列型式で指定する。
        // キーを定義することでビューファイル側で$articleという変数が使用できる
        return view('articles.index', ['articles' => $articles, 'user' => $user]);
    }

    public function likeIndex(){

        $user = Auth::user();
        $articles = Article::withCount('likes')->orderBy('likes_count','desc')->paginate(9);

        return view('articles.indexLikes', ['user'=> $user,'articles'=> $articles]);
    }

    public function card_side(){
        $user = Auth::user();
        // $articles = Article::withCount('likes')->orderBy('likes_count','desc');
        return view('articles.card_side', ['user'=> $user,'articles'=> $articles]);
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });
        $user = Auth::user();

        return view('articles.create', [
            'allTagNames' => $allTagNames,
            'user' => $user,
        ]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
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

        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
            'user' => $user,

        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });
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
        return view('articles.show', [
            'article' => $article,
            'user' => $user,
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

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
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



}
