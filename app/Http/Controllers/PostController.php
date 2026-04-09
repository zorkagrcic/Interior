<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private function getBlogSidebarData()
    {
        return[
            'categories' => Category::all(),
            'recentPosts' => Post::latest()->take(3)->get(),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Post::with(['user', 'category'])->latest();

        if (request()->filled('q')) {
            $query->where('title', 'like', '%' . request('q') . '%');
        }

        if (request()->filled('category_id')) {
            $query->where('category_id', request('category_id'));
        }

        $posts = $query->paginate(10)->withQueryString();

        return view('pages.blog', array_merge(
            $this->getBlogSidebarData(),
            compact('posts')
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //one post details
        $post = Post::with(['user', 'category', 'comments.user'])->findOrFail($id);

        return view('pages.post-details', array_merge($this->getBlogSidebarData(), compact('post')));

    }



    public function filter()
    {
        $query = Post::with(['user', 'category'])->latest();

        if (request()->filled('q')) {
            $query->where('title', 'like', '%' . request('q') . '%');
        }

        if (request()->filled('category_id')) {
            $query->where('category_id', request('category_id'));
        }

        $posts = $query->paginate(10)->withQueryString();

        return view('partials.posts-list', compact('posts'));
    }


}
