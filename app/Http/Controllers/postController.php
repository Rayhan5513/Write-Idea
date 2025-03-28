<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use MessageFormatter;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        if($posts)
        {
            return PostResource::collection($posts);
        }
        else
        {
            return response()->json(['message'=>'No data available'],200);
        }
    }
    public function viewPost ()
    {
        $posts = Post::with(['user', 'categories'])->latest()->get();
        $categories = Category::all();
        return view('dashboard', compact('posts', 'categories'));
    }

    public function postSorting($id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts()->with(['user', 'categories'])->latest()->get();
        $categories = Category::all();
        return view('dashboard', compact('posts', 'categories', 'category'));
    }
    public function showCreate()
    {   
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('storage/images/', $imageName);
            $post->image = $imageName;
        }
        $post->save();
        if ($request->has('categories')){
            $post->categories()->sync($validated['categories']);
        }
        return redirect()->route('dashboard')->with([
            'post' => $post,
            'categories' => $validated['categories'],
        ]);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post deleted successfully!');
    }
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
    }
}
