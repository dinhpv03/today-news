<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPosts() {

        $posts = Post::query()->first('id')->paginate(16);

        return view('all-posts', compact('posts'));
    }
    public function postDetail(Request $request, $slug)
    {
        $post = Post::query()->where('slug', $slug)->firstOrFail();

        if (!$request->session()->has('viewed_article_'.$post->id)) {
            $post->increment('views');
            $request->session()->put('viewed_article_'.$post->id, true);
        }

        return view('post-detail', compact('post'));
    }

}
