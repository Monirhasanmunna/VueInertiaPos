<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $count = $request->input('count');

        $query = Category::query();

        $categories = $query->orderByDesc('id')->Search($search)->paginate($count);
        
        return Inertia::render('Category/Index',[
            'categories' => $categories
        ]);
    }
}
