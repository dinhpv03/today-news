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
        $slide_show_posts = Post::query()
            ->with('category')
            ->latest('id')
            ->take(3)
            ->get();

//        dd($slide_show_posts);

        return view('home',compact('slide_show_posts'));
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


    public function search(Request $request)
    {
        $searchQuery = $request->input('search');

        $results = Post::query()->where(function($query) use ($searchQuery) {
            $query->where('title', 'LIKE', "%{$searchQuery}%")
                ->orWhere('content', 'LIKE', "%{$searchQuery}%");
        })
            ->orWhereHas('category', function($query) use ($searchQuery) {
                $query->where('name', 'LIKE', "%{$searchQuery}%");
            })
            ->with('category')
            ->paginate(10);

        return view('search_results', compact('results', 'searchQuery'));
    }



    public function profile() {

        return view('profile');
    }

    public function comment() {

        return view('comment');
    }
}
