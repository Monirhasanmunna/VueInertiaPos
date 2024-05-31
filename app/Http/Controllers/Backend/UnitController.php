<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $count = $request->input('count');

        $query = Unit::query();

        $units = $query->orderByDesc('id')
                    ->Search($search)
                    ->paginate($count)
                    ->withQueryString();
        
        return Inertia::render('Unit/Index',[
            'units' => $units,
            'filters' => ['search' => $search , 'count' => $count]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:units',
            'short_name' => 'required|unique:units',
        ]);

        $unit = new Unit();
        $unit->name = $request->name;
        $unit->short_name = $request->short_name;
        $unit->save();


        return Redirect::back();
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
        $unit = Unit::where('id', $id)->first();
        return response()->json($unit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:units,name,'. $id,
            'short_name' => 'required|unique:units,short_name,'. $id,
        ]);

        $unit = Unit::where('id', $id)->first();
        $unit->name = $request->name;
        $unit->short_name = $request->short_name;
        $unit->status = $request->status;
        $unit->save();

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::find($id);

        $unit->delete();
        return Redirect::back();
    }
}
