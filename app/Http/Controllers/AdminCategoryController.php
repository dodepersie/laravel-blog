<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('user')) {
            return view('dashboard.categories.index', [
                'categories' => Category::all(),
            ]);
        } else {
            abort(403);
        }
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
    public function store(StoreCategoryRequest $request)
    {
        if (Gate::denies('user')) {
            $validatedData = $request->validated();
            Category::create($validatedData);

            return redirect()->route('categories.index')->with('success', 'Category has been created!');
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if (Gate::denies('user')) {
            $validatedData = $request->validated();
            $category->update($validatedData);

            return redirect()->route('categories.index')->with('success', 'Category has been edited!');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (Gate::denies('user')) {
            Category::destroy($category->id);

            return redirect()->route('categories.index')->with('success', 'Category has been deleted!');
        } else {
            abort(403);
        }
    }
}
