<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comments;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $title = __('posts.latest');

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            if ($category) {
                $title = __('posts.in_category', ['category' => $category->name]);
            }
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            if ($author) {
                $title = __('posts.by_author', ['author' => $author->name]);
            }
        }

        $posts = Post::latest()->filter(request(['category', 'author', 'search']))->paginate(4)->withQueryString();

        return view('posts', compact('posts', 'title'));
    }

    public function show($slug)
    {
        app()->setLocale('id');
        
        $posts = Post::latest()->first();
        
        $post = Post::where('slug', $slug)->first();
        
        if (!$post) {
            return view('errors.404', [
                'title' => '404',
            ]);
        }

        // Mendapatkan posting yang sedang dilihat
        $current_post = Post::findOrFail($post->id);

        // Mendapatkan related posts berdasarkan category_id
        $related_posts = Post::where('category_id', $current_post->category_id)
                        ->where('id', '<>', $current_post->id) // Menghindari menampilkan posting yang sedang dilihat
                        ->inRandomOrder()
                        ->get();
        
        // Parent Comments
        $comments = $post->comments()->with('childs')->where('comment_parent_id', 0)->latest()->paginate(5);

        return view('post', [
            "title" => $post->title,
            "post" => $post,
            "posts" => $posts,
            "related_posts" => $related_posts,
            "comments" => $comments,
        ]);
    }

    public function postComment(Request $request)
    {
        // Biar ga kena inspect element
        if (
            auth()->check() && ($request['comment_user_name'] != auth()->user()->name
                || $request['comment_user_email'] != auth()->user()->email)
        ) {
            return redirect(url()->previous() . '#comments')->with('comment_force_edit_error', __('post.comment_force_edit_error'));
        }

        Comments::create($request->all());
        return redirect(url()->previous() . '#comments')->with('success', __('post.comment_success'));
    }

    public function deleteComment(Request $request)
    {
        $comments = Comments::where('id', $request['comment_id']);

        // Delete parent comment
        $comments->delete();

        // Delete reply comment
        $replyComments = Comments::where('comment_parent_id', $request['comment_id'])->get();
        foreach ($replyComments as $replyComment) {
            $replyComment->delete();
        }
        
        return redirect(url()->previous() . '#comments')->with('success', __('post.comment_deleted'));
    }
}
