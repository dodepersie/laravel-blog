<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('user')) {
            return view('dashboard.post.index', [
                'posts' => Post::where('user_id', auth()->user()->id)
                ->latest()
                ->get(),
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
            return view('dashboard.post.create', [
                'categories' => Category::all(),
            ]);
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        if (Gate::denies('user')) {
            $validatedData = $request->validated();

            if($request->file('image'))
            {
                $validatedData['image'] = $request->file('image')->store('post_images');
            }

            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

            Post::create($validatedData);
            
            return redirect()->route('posts.index')->with('success', 'Post has been created!');
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (auth()->user()->id !== intval($post->user_id)) {
            abort(403);
        }

        if (Gate::denies('user')) {
            return view('dashboard.post.show', [
                'post' => $post
            ]);
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (auth()->user()->id !== intval($post->user_id)) {
            abort(403);
        }

        if (Gate::denies('user')) {
            return view('dashboard.post.edit', [
                'post' => $post,
                'categories' => Category::all(),
            ]);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if (Gate::denies('user')) {
            $validatedData = $request->validated();

            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

            if($request->file('image'))
            {
                if($request->oldImage) {
                    Storage::delete($request->oldImage);
                }

                $validatedData['image'] = $request->file('image')->store('post_images');
            }

            Post::where('id', $post->id)
                ->update($validatedData);

            return redirect()->route('posts.index')->with('success', 'Post has been edited!');
        } else {
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (Gate::denies('user')) {
            if($post->image)
            {
                Storage::delete($post->image);
            }

            Post::destroy($post->id);

            return redirect()->route('posts.index')->with('success', 'Post has been deleted!');
        } else {
            abort(403);
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
