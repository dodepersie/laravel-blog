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

        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            if ($category) {
                $title = __('posts.in_category', ['category' => $category->name]);
            }
        }
        
        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            if ($author) {
                $title = __('posts.by_author', ['author' => $author->name]);
            }
        }

        $posts = Post::latest()->filter(request(['category', 'author', 'search']))->paginate(5)->withQueryString();

        return view('posts', compact('posts', 'title'));
    }

    public function show($locale, $slug)
    {
        app()->setLocale($locale);
        $post = Post::where('slug', $slug)->firstOrFail();
        $posts = Post::latest()->first();
            
        if(auth()->check())
        {
            $user = auth()->user();
            $avatar = $user->avatar;
        }

        return view('post', [
            "title" => $post->title,
            "post" => $post,
            "posts" => $posts,
            "comments" => $posts->comments,
        ]);
    }

    public function postComment(Request $request)
    {
        // Validate the user input
        $request->validate([
            'comment_message' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (preg_match('/<script\b[^>]*>.*?<\/script?>/si', $value)) {
                        $fail(__('post.comment_failed'));
                    } elseif (preg_match('/<script\b[^>]*>/si', $value)) {
                        $fail(__('post.comment_failed'));
                    } elseif (preg_match('/<\/script>/si', $value)) {
                        $fail(__('post.comment_failed'));
                    } elseif (preg_match('/<div\b[^>]*>.*?<\/div?>/si', $value)) {
                        $fail(__('post.comment_failed'));
                    } elseif (preg_match('/<div\b[^>]*>/si', $value)) {
                        $fail(__('post.comment_failed'));
                    } elseif (preg_match('/<\/div>/si', $value)) {
                        $fail(__('post.comment_failed'));
                    } elseif (preg_match('/<style\b[^>]*>.*?<\/style?>/si', $value)) {
                        $fail(__('post.comment_failed'));
                    } elseif (preg_match('/<ol\b[^>]*>.*?<\/ol?>/si', $value)) {
                    
                    } elseif (preg_match('/<li\b[^>]*>.*?<\/li?>/si', $value)) {
                    
                    } elseif (preg_match('/<ul\b[^>]*>.*?<\/ul?>/si', $value)) {
                    
                    } elseif (preg_match('/<strong\b[^>]*>.*?<\/strong?>/si', $value)) {
                    
                    } elseif (preg_match('/<em\b[^>]*>.*?<\/em?>/si', $value)) {
                    
                    } elseif (preg_match('/<u\b[^>]*>.*?<\/u?>/si', $value)) {
                    
                    } else {
                        
                    }
                }
            ]
        ]);

        // Biar ga kena inspect element
        if (auth()->check() && (
            $request->input('comment_user_name') != auth()->user()->name
            || $request->input('comment_user_email') != auth()->user()->email
            || $request->input('comment_avatar') != auth()->user()->avatar)) {
            return redirect()->back()->with('comment_force_edit_error', __('post.comment_force_edit_error'));
        }

        $post_id = $request->input('post_id');
        $request->request->add(['post_id' => $post_id]);
        $comments = Comments::create($request->all());
        return redirect()->back()->with('comment_success', __('post.comment_success'));
    }

}
