<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tax;
use App\Models\Unit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $count = $request->input('count');

        $products = Product::with(['category', 'tax', 'brand', 'unit', 'images', 'details'])
                    ->orderByDesc('id')
                    ->Search($search)
                    ->paginate($count)
                    ->withQueryString();

        
        return Inertia::render('Product/Index',[
            'products' => $products,
            'filters' => ['search' => $search , 'count' => $count]
        ]);

    }

    /**
     * Show the form for getAllData a new resource.
     */
    public function getAllData()
    {
        $categories = Category::where('status', true)->get();
        $brands = Brand::where('status', true)->get();
        $units = Unit::where('status', true)->get();
        $taxes = Tax::where('status', true)->get(); 


        return response()->json([
            'categories' => $categories,
            'brands' => $brands,
            'units' => $units,
            'taxes' => $taxes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
