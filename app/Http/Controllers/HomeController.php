<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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



    public function index()
    {
        $slide_show_posts = Post::query()
            ->with('category')
            ->select('id', 'title','image', 'slug', 'category_id')
            ->latest('id')
            ->take(3)
            ->get();

        $topPosts = Post::query()
            ->with('category')
            ->orderBy('views', 'desc')
            ->take(7)
            ->get();

        $new_posts = Post::query()
            ->first('id')
            ->paginate(8);

        $world_news = Post::query()
            ->where('category_id',9)
            ->get();

        return view('home', compact('topPosts','slide_show_posts','new_posts','world_news'));
    }


    public function postsByCategory($id)
    {
        $category = Category::query()->with('posts')->findOrFail($id);

        return view('posts-by-category', compact('category'));
    }

    public function search(Request $request)
    {
        $searchQuery = request()->validate([
            'search' => 'required',
        ])['search'];

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

    public function contact() {

        return view('contact');
    }

    public function profile() {

        return view('profile');
    }

    public function comment() {

        return view('comment');
    }
}
