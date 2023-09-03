<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('god');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('god');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $this->authorize('god');
        $validatedData = $request->validated();
        News::create($validatedData);

        return back()->with('success', 'Informasi berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $this->authorize('god');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $this->authorize('god');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $this->authorize('god');
        $validatedData = $request->validated();
        News::where('id', $news->id)->update($validatedData);

        return back()->with('success', 'Informasi berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $this->authorize('god');
        News::destroy($news->id);

        return back()->with('success', 'Informasi telah dihapus!');
    }
}
