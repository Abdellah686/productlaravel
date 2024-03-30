<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        $isUpdate = false;
        
        return view('categories.form', compact('category', 'isUpdate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return to_route('categories.index')->with('success', 'category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products= $category->products()->get();
        return view('categories.show', compact('category', 'products'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $isUpdate = true;
        return view('categories.form', compact('category', 'isUpdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->validated())->save();
        return to_route('categories.index')->with('success', 'category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('categories.index')->with('success', 'category deleted successfully');
        dd($category);
    }
}
