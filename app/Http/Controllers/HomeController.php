<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    private function getBlogSidebarData()
    {
        return [
            'categories' => Category::all(),
            'recentPosts' => Post::latest()->take(3)->get(),

        ];
    }

    public function index()
    {
        $bannerPosts = Post::with('user')->latest()->take(6)->get();
        $homePosts = Post::with(['user', 'category'])->latest()->take(3)->get();

        return view('pages.home', array_merge($this->getBlogSidebarData(), compact('bannerPosts', 'homePosts')));
    }
}
