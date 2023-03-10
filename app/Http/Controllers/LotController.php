<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lot = Lot::all();

        if(filled($request->category_filter)){
            $lot = Lot::query()->categoryFilter($request->category_filter)->get();
        }

        return view('lot.index', ['lots' => $lot, 'categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lot.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->only([
           'name',
           'description',
           'category_id'
        ]);

        Lot::query()->insert($data);

        return redirect(route('lot.index'))->with('success', 'Lot added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lot = Lot::query()->findOrFail($id);

        return view('lot.show', ['lot' => $lot]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lot = Lot::query()->findOrFail($id);

        return view('lot.edit', ['lot' => $lot, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->only([
            'name',
            'description',
            'category_id'
        ]);

        Lot::query()->where('id',$id)->update($data);

        return redirect(route('lot.index'))->with('success', 'Lot updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lot::destroy($id);

        return redirect(route('lot.index'))->with('success', 'Lot deleted successfully');
    }
}
