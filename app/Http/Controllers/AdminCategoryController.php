<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
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
                'categories' => Category::all()
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
        if (Gate::denies('user')) {
            return redirect('/dashboard/categories')->with('info', '/create/ page moved to Index!');
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::denies('user')) {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'slug' => 'required|unique:posts',
            ]);

            Category::create($validatedData);

            return redirect('/dashboard/categories')->with('success', 'Category has been created!');
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
        if (Gate::denies('user')) {
            return redirect('/dashboard/categories')->with('info', '/edit/ page moved to Index!');
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if (Gate::denies('user')) {
            $validatedData = $request->validate([
                'name' => 'max:255',
                'slug' => 'required|max:255',
            ]);
        
            $category->update($validatedData);
        
            return redirect('/dashboard/categories')->with('success', 'Category has been edited!');
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

            return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
        } else {
            abort(403);
        }
    }
}
