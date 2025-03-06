<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string|max:500',
        ]);

        $comment = new Comment();
        $comment->body =$request->comment;
        $user=Auth::user();
        $comment->user_id= $user->id;
        $comment->post_id= $id;

        $comment->save();
        $comments = Comment::where('post_id', $id)->get();
        return redirect()->route('dashboard');
    }

    public function index(Post $post)
    {
        return view('posts.comments', ['post' => $post, 'comments' => $post->comments]);
    }
}
