<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index(User $user,  Article $article)

    {
        $user = Auth::user();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);
        $all_users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(9);
        $articles = Article::orderBy('created_at', 'desc')->paginate(9);
        $auth_user = Auth::user();



        return view('users.index', [
            'all_users'  => $all_users,
            'user' => $user,
            'users' => $users,
            'articles' => $articles,
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
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->paginate(5);
        $articles = $user->articles->sortByDesc('created_at');
        $auth_user = Auth::user();

        return view('users.show', [
            'user' => $user,
            'users' => $users,
            'articles' => $articles,
            'article' => $article,
            'auth_user' => $auth_user,
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
        $articles = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'auth_user' => $auth_user,
            'users'  => $users,
            'articles' => $articles,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();
        $auth_user = Auth::user();
        $followings = $user->followings->sortByDesc('created_at');

        return view('users.followings', [
            'user' => $user,
            'auth_user' => $auth_user,
            'followings' => $followings,

        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();
        $auth_user = Auth::user();
        $followers = $user->followers->sortByDesc('created_at');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
            'auth_user' => $auth_user,
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
}
