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

    //不要画像削除メソッド（Controller内で呼び出す）
    public function deleteImg($article)
    {
        Log::debug('<<<  deleteImg  >>>');

        //登録・更新する記事idに一致する画像をDBからランダムで10件取得する
        $files_DB = ArticleImg::select('id', 'path')->where('article_id', $article->id)->inRandomOrder()->take(10)->get();

        foreach ($files_DB as $file_DB) {
            //取得した画像のファイル名を取得
            $PATH_DB = str_replace('article_imgs/', '', $file_DB->path);
            //記事本文に取得した画像ファイル名がない場合、DBレコードと画像ファイルを削除
            if (strpos($article->body, $PATH_DB) === false) {
                //DBレコード削除
                ArticleImg::find($file_DB->id)->delete();
                //画像ファイル削除
                Storage::delete('public/article_imgs/' . $PATH_DB);
            }
        }
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

        //不要な画像削除する（Controller内で定義した関数を呼び出す）
        $this->deleteImg($article);

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
        Log::debug('$request');
        Log::debug($request);
        $postType = $request->postType;
        $articleId = $request->article_id;
        $isDelete = $request->isDelete;
        //記事本文画像の場合
        if ($postType === "body") {
            $Articleimg = new ArticleImg;
            $Articleimg->article_id = $articleId;
            $Articleimg->path = $request->file;
            $path = $request->file->store('public/article_imgs');
            $Articleimg->path = str_replace('public/', '', $path);
            $Articleimg->save();

            $response = $Articleimg->path;
            //ヘッダー画像の場合
        } else if ($postType === "header") {
            //現在使用している画像ファイルを削除する
            $article = Article::find($articleId);
            Log::debug('$article');
            Log::debug($article);

            Storage::delete('public/' . $article->img);

            //削除か更新かで処理を変える
            if ($isDelete) {
                $article->img = null;
            } else {
                $path = $request->file->store('public/article_header_imgs');
                $article->img = str_replace('public/', '', $path);
            }
            $article->save();

            $response = $article->img;
        }

        return response()->json($response);
    }
}
