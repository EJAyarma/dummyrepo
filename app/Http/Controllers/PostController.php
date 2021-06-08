<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate(20);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request) {
        $rules = [
            'body' => 'required'
        ];

        $this->validate($request, $rules);

        $request->user()->posts()->create($request->only('body'));
        return back();
    }
}
