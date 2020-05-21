<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Tag;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;

class UserController extends Controller
{
    //コントローラ全体で使用　自分の記事数取得（公開中のみ）
    private function articleOpenCount($name)
    {
        $self = User::where('name', $name)->first();
        return $self->articles->sortByDesc('created_at')->where('open_flg', 0);
    }

    //コントローラ全体で使用　自分の記事取得（下書きのみ）
    private function articleDraftCount($name)
    {
        $self = User::where('name', $name)->first();
        return $self->articles->sortByDesc('created_at')->where('open_flg', 1);
    }

    public function index(User $user,  Article $article)
    {
        $user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);
        $all_users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(9);
        //記事は、公開中のみ
        $articles = Article::orderBy('created_at', 'desc')->where('open_flg', 0)->paginate(9);
        $auth_user = Auth::user();

        $tags = Tag::all();

        return view('users.index', [
            'all_users'  => $all_users,
            'user' => $user,
            'users' => $users,
            'articles' => $articles,
            'auth_user' => $auth_user,
            'tags' => $tags,
        ]);
    }

    public function draft(String $name,  Article $article)
    {
        $user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);
        $all_users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(9);
        $auth_user = Auth::user();

        //記事は、下書きのみ
        $myArticles = $this->articleOpenCount($name);
        $articles = $this->articleDraftCount($name);

        return view('users.draft', [
            'all_users'  => $all_users,
            'user' => $user,
            'users' => $users,
            'articles' => $articles,
            'myArticles' => $myArticles,
            'auth_user' => $auth_user,
        ]);
    }
    public function user_side(User $user)
    {

        $user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);

        return view('users.user_side', [
            'users'  => $users,
            'user' => $user,
        ]);
    }

    public function show(string $name, Article $article)
    {
        $user = User::where('name', $name)->first();
        $auth_user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);

        $myArticles = $this->articleOpenCount($name);

        return view('users.show', [
            'user' => $user,
            'users' => $users,
            //自分の記事一覧 = $myArticles
            'articles' => $myArticles,
            'article' => $article,
            'auth_user' => $auth_user,
            'myArticles' => $myArticles,
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
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);
        $auth_user = Auth::user();
        $user->title = $request->title;
        $user->comment = $request->comment;
        $user->url = $request->url;
        $user->twitter_url = $request->twitter_url;
        $user->facebook_url = $request->facebook_url;
        $user->instagram_url = $request->instagram_url;
        $articles = $user->articles->sortByDesc('created_at');
        if ($request->profile_photo !== null) {
            $request->profile_photo->storeAs('public/user_images', $user->id . '.jpg');
            $user->profile_photo = $user->id . '.jpg';
        }
        $user->fill($request->all())->save();


        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
            'auth_user' => $auth_user,
            'users' => $users,
        ]);
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();
        $auth_user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);

        $articles = $user->likes->where('open_flg', 0)->sortByDesc('created_at');
        $myArticles = $this->articleOpenCount($name);

        return view('users.likes', [
            'user' => $user,
            'auth_user' => $auth_user,
            'users'  => $users,
            'articles' => $articles,
            'myArticles' => $myArticles,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();
        $auth_user = Auth::user();
        $followings = $user->followings->sortByDesc('created_at');
        $myArticles = $this->articleOpenCount($name);


        return view('users.followings', [
            'user' => $user,
            'auth_user' => $auth_user,
            'followings' => $followings,
            'myArticles' => $myArticles,
        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();
        $auth_user = Auth::user();
        $followers = $user->followers->sortByDesc('created_at');
        $myArticles = $this->articleOpenCount($name);


        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
            'auth_user' => $auth_user,
            'myArticles' => $myArticles,
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
