<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('god');

        return redirect('/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('god');

        return redirect('/dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('god');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ], [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute may not be greater than :max kilobytes.',
        ]);

        News::create($validatedData);
        
        return redirect('/dashboard')->with('success', 'News has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $this->authorize('god');

        return redirect('/dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $this->authorize('god');

        return redirect('/dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $this->authorize('god');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ], [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute may not be greater than :max kilobytes.',
        ]);

        News::where('id', $news->id)->update($validatedData);
        
        return redirect('/dashboard')->with('success', 'News has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $this->authorize('god');

        News::destroy($news->id);

        return redirect('/dashboard')->with('success', 'News has been deleted!');
    }
}
