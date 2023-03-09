<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->only([ 'name' ]);
        Category::query()->insert($data);

        return redirect(route('category.index'))->with('success', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::query()->findOrFail($id);

        return view('category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::query()->findOrFail($id);

        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->only([ 'name' ]);

        Category::query()->where('id',$id)->update($data);

        return redirect(route('category.index'))->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);

        return redirect(route('category.index'))->with('success', 'Category deleted successfully');
    }
}
