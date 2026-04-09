<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|min:3|max:1000',
            'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}
