<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Traits\ImageSaver;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use ImageSaver;

    public function index(Request $request)
    {
        $search = $request->input('search');
        $count = $request->input('count');

        $query = Category::query();

        $categories = $query->orderByDesc('id')
                    ->Search($search)
                    ->paginate($count)
                    ->withQueryString();
        
        return Inertia::render('Category/Index',[
            'categories' => $categories,
            'filters' => ['search' => $search , 'count' => $count]
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();


        if ($request->hasFile('image')) {
            $this->upload_file($request->file('image'), $category, 'image', 'category');
        }

        return Redirect::back();
    }

 
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return response()->json($category);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'. $id,
        ]);

        $category = Category::where('id', $id)->first();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();


        if ($request->hasFile('image')) {
            $this->upload_file($request->file('image'), $category, 'image', 'category');
        }

        return Redirect::back();
    }


    public function destroy($id)
    {
        $category = Category::find($id);

        if(File::exists(public_path($category->image))){
            File::delete(public_path($category->image));
        }
        
        $category->delete();
        return Redirect::back();
    }
}
