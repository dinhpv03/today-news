<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    const PATH_VIEW = 'admin.posts.';
    const PATH_UPLOAD = 'posts';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::query()->with(['category', 'user'])->latest('id')->get();

//        dd($posts);

        return view(self::PATH_VIEW . __FUNCTION__, compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('image');
        $data['is_active'] ??= 0;
        $data['author_id'] = Auth::id();

//        dd($data);


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store(self::PATH_UPLOAD, 'public');
        }

        Post::query()->create($data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::query()->with(['category'])->findOrFail($id);

        $categories = Category::all();

        return view(self::PATH_VIEW . __FUNCTION__, compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::query()->with(['category'])->findOrFail($id);

        $data = $request->except('image');

        $data['is_active'] ??= 0;

        $data['author_id'] = Auth::id();

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            $data['image'] = $request->file('image')->store(self::PATH_UPLOAD, 'public');
        }

//        dd($data);
        $post->update($data);


        return redirect()->route('admin.posts.index')
            ->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Post::query()->findOrFail($id);

        $data->delete();

        return redirect()->route('admin.posts.index');
    }
}
