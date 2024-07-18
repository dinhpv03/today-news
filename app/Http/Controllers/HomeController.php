<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

//    public function __construct()
//    {
//        $this->middleware('auth')->only(['profile', 'comment']);
//    }


    public function index()
    {
//        $data = Category::all();

        return view('home');
    }

    public function postsByCategory($id)
    {
        $category = Category::query()->with('posts')->findOrFail($id);

        return view('posts-by-category', compact('category'));

    }

    public function postDetail($id) {

        $post = Post::query()->findOrFail($id);

        return view('post-detail', compact('post'));
    }

    public function profile() {

        return view('profile');
    }

    public function comment() {

        return view('comment');
    }
}
