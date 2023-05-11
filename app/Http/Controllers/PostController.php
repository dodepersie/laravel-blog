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
        $post = Post::where('slug', $slug)->first();
        if(!$post) {
            return view('errors.404', [
                'title' => '404',
            ]);
        }
        $posts = Post::latest()->first();

        return view('post', [
            "title" => $post->title,
            "post" => $post,
            "posts" => $posts,
            "comments" => $posts->comments,
        ]);
    }

    public function postComment(Request $request)
    {  
        if(auth()->user()->avatar === null) {
            $avatar = 'noprofile.jpg';
        } else {
            $avatar = $request['comment_avatar'];
        }

        // Biar ga kena inspect element
        if (auth()->check() && (
            $request['comment_user_name'] != auth()->user()->name
            || $request['comment_user_email'] != auth()->user()->email
            || $request['comment_avatar'] != $avatar)) {
            return redirect(url()->previous().'#comments')->with('comment_force_edit_error', __('post.comment_force_edit_error'));
        }        

        Comments::create($request->all());
        return redirect(url()->previous().'#comments')->with('comment_success', __('post.comment_success'));

    }
}
