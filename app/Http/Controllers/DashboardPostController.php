<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
                'title' => 'Artikel dari '.auth()->user()->name,
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
                'title' => 'Buat Artikel',
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

            if ($request->hasFile('image')) {
                $post_image = $request->file('image');

                $post_image_proceed = Image::make($post_image)->encode('webp', 90);
                $post_image_name = uniqid('img_').'.webp';
                $post_image_path = 'post_images/'.$post_image_name;
                $post_image_proceed->save($post_image_path);
                $validatedData['image'] = $post_image_name;
            }

            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

            Post::create($validatedData);

            return redirect()->route('posts.index')->with('success', 'Artikel berhasil dibuat!');
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
                'post' => $post,
                'title' => 'Viewing: '.$post->title,
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
                'title' => 'Editing: '.$post->title,
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

            if ($request->file('image')) {
                if ($request->oldImage) {
                    $oldAvatarPath = 'post_images/'.$post->image;
                    if (file_exists($oldAvatarPath)) {
                        unlink($oldAvatarPath);
                    }
                }

                $post_image = $request->file('image');
                $post_image_proceed = Image::make($post_image)->encode('webp', 90);
                $post_image_name = uniqid('img_').'.webp';
                $post_image_path = 'post_images/'.$post_image_name;
                $post_image_proceed->save($post_image_path);
                $validatedData['image'] = $post_image_name;
            }

            Post::where('id', $post->id)
                ->update($validatedData);

            return redirect()->route('posts.index')->with('success', 'Artikel berhasil diedit!');
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
            if ($post->image) {
                Storage::delete($post->image);
            }

            Post::destroy($post->id);

            return redirect()->route('posts.index')->with('success', 'Artikel telah dihapus!');
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
