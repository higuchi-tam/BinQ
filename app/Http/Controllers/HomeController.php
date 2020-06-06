<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth_user = Auth::user();
        $articles = Article::orderBy('created_at', 'desc')
            ->where('open_flg', 0)
            ->take(11)
            ->get();
        $users = User::withCount('followers')->orderBy('followers_count', 'desc')->take(11)->get();

        if ($auth_user) {
            return redirect()->route('users.index');
        }
        return view('layouts.topbaner', [
            'auth_user' => $auth_user,
            'articles' => $articles,
            'users' => $users,
        ]);
    }
}
