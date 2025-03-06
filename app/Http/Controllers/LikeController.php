<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likePost(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);

        $user = Auth::user();
        $postId = $request->post_id;
        $existingLike = Like::where('user_id', $user->id)->where('post_id', $postId)->first();

        if ($existingLike) {
            $existingLike->delete();
        } 
        else
         {
            Like::create([
                'user_id' => $user->id,
                'post_id' => $postId,
                'likes' => 1
            ]);
        }
        return back();
    }
}
