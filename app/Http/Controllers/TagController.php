<?php

namespace App\Http\Controllers;

use App\User;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TagController extends Controller
{
    public function show(string $name)
    {
        $tag = Tag::where('name', $name)->first();
        $user = Auth::user();
        $auth_user = Auth::user();

        $tags = Tag::all();

        return view('tags.show', [
            'user' => $user,
            'auth_user' => $auth_user,
            'tag' => $tag,
            'tags' => $tags
        ]);
    }
}
