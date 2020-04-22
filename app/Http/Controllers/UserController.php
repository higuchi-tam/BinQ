<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index(User $user)
{
    $all_users = $user->getAllUsers(auth()->user()->id);
    $user = Auth::user();

    return view('users.index', [
        'all_users'  => $all_users,
        'user' => $user,
    ]);
}



    public function show(string $name, Article $article)
    {
        $user = User::where('name', $name)->first();
        // $user = Auth::user();
        $articles = $user->articles->sortByDesc('created_at');
        $profile_photo = $user->profile_photo;

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
            'article' => $article,
            'profile_photo' => $profile_photo,
        ]);
    }

    public function edit(string $name)
    {
        $user = User::where('name', $name)->first();

        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user, string $name)
    {

        $user = User::where('name', $name)->first();
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
        ]);
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();

        $articles = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();

        $followings = $user->followings->sortByDesc('created_at');

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();

        $followers = $user->followers->sortByDesc('created_at');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
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
