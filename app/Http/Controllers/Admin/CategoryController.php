<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    const PATH_VIEW = 'admin.categories.';
    const PATH_UPLOAD = 'categories';

    public function index()
    {
        $data = Category::query()->first('id')->paginate('5');

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view(self::PATH_VIEW . __FUNCTION__);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|'
        ]);

        $data = $request->all();
        if($request->hasFile('image')) {
            $data['image'] = Storage::put('public/'.self::PATH_UPLOAD, $request->file('image'));
        }

         Category::query()->create($data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $model = Category::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Category::query()->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if($request->hasFile('image')) {
            $data['image'] = Storage::put('public/'.self::PATH_UPLOAD, $request->file('image'));
        }

        $currentImage = $model->image;

        $model->update($data);

        if($request->hasFile('image') && $currentImage && Storage::exists($currentImage)) {
            Storage::delete($currentImage);
        }

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Category::query()->findOrFail($id);

        $data->delete();

        return redirect()->route('admin.categories.index');

    }
}
