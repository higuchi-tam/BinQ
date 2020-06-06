<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Tag;
use App\Like;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->sidebarArticles = Article::withCount('likes')->orderBy('likes_count', 'desc')->where('open_flg', 0)->take(5)->get();
        $this->sidebarUsers = User::withCount('followers')->orderBy('followers_count', 'desc')->take(5)->get();
    }

    //コントローラ全体で使用　自分の記事数取得（公開中のみ）
    private function getBaseArticles($userId)
    {
        $user = User::where('userId', $userId)->first();
        $baseArticles = Article::where('user_id', $user->id)
            ->where('open_flg', 0)->orderBy('created_at', 'desc');
        return $baseArticles;
    }

    public function index(User $user,  Article $article)
    {
        $user = Auth::user();
        $all_users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(9);
        $auth_user = Auth::user();
        $tags = Tag::all();

        return view('users.index', [
            'all_users'  => $all_users,
            'user' => $user,
            'auth_user' => $auth_user,
            'tags' => $tags,
            //サイドバー用
            'sidebarArticles' => $this->sidebarArticles,
            'sidebarUsers' => $this->sidebarUsers,
        ]);
    }

    public function draft(String $name,  Article $article)
    {
        $user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);
        $all_users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(9);
        $auth_user = Auth::user();

        $baseArticles = $this->getBaseArticles($name);
        //記事は、下書きのみ
        $totalArticles = $baseArticles->get();
        $articles = Article::where('user_id', $user->id)->where('open_flg', 1)->orderBy('created_at', 'desc')->paginate(9);
        Log::debug($articles);

        return view('users.draft', [
            'all_users'  => $all_users,
            'user' => $user,
            'users' => $users,
            'articles' => $articles,
            'totalArticles' => $totalArticles,
            'auth_user' => $auth_user,
            //サイドバー用
            'sidebarArticles' => $this->sidebarArticles,
            'sidebarUsers' => $this->sidebarUsers,
        ]);
    }

    public function show(string $userId, Article $article)
    {
        $user = User::where('userId', $userId)->first();
        $auth_user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);

        $baseArticles = $this->getBaseArticles($userId)->where('open_flg', 0);

        $totalArticles = $baseArticles->get();
        $articles = $baseArticles->paginate(9);

        return view('users.show', [
            'user' => $user,
            'users' => $users,
            //自分の記事一覧 = $myArticles
            'totalArticles' => $totalArticles,
            'article' => $article,
            'auth_user' => $auth_user,
            'articles' => $articles,
            //サイドバー用
            'sidebarArticles' => $this->sidebarArticles,
            'sidebarUsers' => $this->sidebarUsers,
        ]);
    }


    public function edit(string $name)
    {
        $user = User::where('name', $name)->first();
        $auth_user = Auth::user();

        return view('users.edit', [
            'user' => $user,
            'auth_user' => $auth_user,
        ]);
    }

    public function update(UserRequest $request, User $user, string $name)
    {
        $user = User::where('name', $name)->first();
        $user->title = $request->title;
        $user->comment = $request->comment;
        $user->url = $request->url;
        $user->twitter_url = $request->twitter_url;
        $user->facebook_url = $request->facebook_url;
        $user->instagram_url = $request->instagram_url;
        $user->fill($request->all())->save();

        return redirect()->route('users.show', $user->name);
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();
        $auth_user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);

        // $articles = $user->likes->where('open_flg', 0)->sortByDesc('created_at')->paginate(9);

        $likeIds = Like::where('likes.user_id', $user->id)->get('article_id');
        $articles = Article::whereIn('id', $likeIds)->paginate(9);

        $baseArticles = $this->getBaseArticles($name);
        $totalArticles = $baseArticles->get();
        $totalArticles = $baseArticles->get();

        return view('users.likes', [
            'user' => $user,
            'auth_user' => $auth_user,
            'users'  => $users,
            'articles' => $articles,
            'totalArticles' => $totalArticles,
            //サイドバー用
            'sidebarArticles' => $this->sidebarArticles,
            'sidebarUsers' => $this->sidebarUsers,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();
        $auth_user = Auth::user();
        $followings = $user->followings->sortByDesc('created_at');

        $baseArticles = $this->getBaseArticles($name);

        $totalArticles = $baseArticles->get();
        $articles = $baseArticles->paginate(9);

        return view('users.followings', [
            'user' => $user,
            'auth_user' => $auth_user,
            'followings' => $followings,
            'articles' => $articles,
            'totalArticles' => $totalArticles,
            //サイドバー用
            'sidebarArticles' => $this->sidebarArticles,
            'sidebarUsers' => $this->sidebarUsers,
        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();
        $auth_user = Auth::user();
        $followers = $user->followers->sortByDesc('created_at');

        $baseArticles = $this->getBaseArticles($name);

        $totalArticles = $baseArticles->get();
        $articles = $baseArticles->paginate(9);

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
            'auth_user' => $auth_user,
            'articles' => $articles,
            'totalArticles' => $totalArticles,
            //サイドバー用
            'sidebarArticles' => $this->sidebarArticles,
            'sidebarUsers' => $this->sidebarUsers,
        ]);
    }


    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }

    public function ajaxImgUpload(Request $request)
    {
        Log::debug('<<<<<<<< User imgupload ajax>>>>>>>>>>>>>');
        Log::debug('$request');
        Log::debug($request);

        $userId = $request->user_id;
        $isDelete = $request->isDelete;

        $x = intval($request->{'crop-x'});
        $y = intval($request->{'crop-y'});
        $w = intval($request->{'crop-w'});
        $h = intval($request->{'crop-h'});

        //現在使用している画像ファイルを削除する
        $user = User::find($userId);
        Storage::delete('public/' . $user->profile_photo);

        //削除か更新かで処理を変える
        if ($isDelete) {
            $user->profile_photo = null;
        } else {
            $path = $request->file->store('public/temporary');
            $temporaryPath =  str_replace('public/', '', $path);
            $newPath = str_replace('public/temporary', '', 'user_images' . $path);

            $image = Image::make(storage_path("app/public/$temporaryPath"))->crop($w, $h, $x, $y);
            $image->save(storage_path("app/public/$newPath"));

            $user->profile_photo = $newPath;
        }
        Storage::deleteDirectory("/public/temporary");

        $user->save();
        $response = $user->profile_photo;

        return response()->json($response);
    }
}
