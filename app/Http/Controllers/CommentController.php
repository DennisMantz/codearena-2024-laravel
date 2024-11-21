<?php

namespace App\Http\Controllers;

use App\Models\Post; 
use App\Models\Comment; 
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'body' => 'required|string|max:255',
        ]);

        $post->comments()->create($validated);

        return redirect()->route('post', $post)->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        $postSlug = $comment->post->slug; 
        $comment->delete(); 
    
        return redirect()->route('post', $postSlug); 
    }
}
