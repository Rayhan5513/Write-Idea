<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-app-layout>
        <div class="py-12 px-32">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex space-x-4 mb-6">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-300 rounded-lg text-black">
                            All Posts
                        </a>
                        @foreach ($categories as $cat)
                            <a href="{{ route('category.posts', $cat->id) }}" 
                               class="px-4 py-2 rounded-lg text-white" 
                               style="background-color: {{ $cat->getRandomColor() }}">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                    @if(session('success'))
                        <div id="success-message" class="bg-green-500 text-white p-3 mb-4 rounded fixed top-20 right-20 shadow-lg z-50">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(isset($category))
                    <h2 class="px-4 py-2 rounded-lg font-bold text-3xl text-center" 
                      style="color: {{ $cat->getRandomColor() }};">
                      {{ $category->name }} post
                    </h2>
                    @else
                        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">All Posts</h2>
                    @endif
                    @foreach ($posts as $post)
                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-6 relative">
                            <div class="absolute top-4 right-4">
                                <button onclick="toggleMenu('{{ $post->id }}')" class="text-black hover:text-gray-800 text-2xl font-bold p-2">
                                    ⋮
                                </button>
                                <div id="menu-{{ $post->id }}" class="hidden absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                                    @if((auth()->user()->isAuthor() && (auth()->user()->id == $post->user->id)) || auth()->user()->isAdmin())
                                        <a href="{{ route('posts.edit', $post->id) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">
                                            ✏️ Edit
                                        </a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="block"
                                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100">
                                                🗑️ Delete
                                            </button>
                                        </form>
                                    @else
                                        <h3 class="px-4 py-2 text-gray-700">You are not permitted</h3>
                                    @endif
                                </div>
                            </div>
                            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-pink-600 to-purple-600">
                                {{ $post->title }}
                            </h1>
                            <div class="flex flex-wrap gap-4 mt-4">
                                @foreach ($post->categories as $category)
                                    <a href="{{ route('category.posts', $category->id) }}" 
                                       class="inline-block py-1 px-6 text-sm font-semibold text-white rounded-full"
                                       style="background-color: {{ $category->getRandomColor() }}">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                            <h5 class="text-gray-600 font-bold dark:text-gray-400">By: {{ $post->user->name }}</h5>
                            @if ($post->image)
                                <img src="{{ asset('storage/images/' . $post->image) }}" alt="Post Image"
                                    class="w-[200px] h-[200px] rounded-lg mb-4">
                            @endif
                            <p class="text-gray-700 dark:text-gray-300 mt-2">Details: {{ $post->content }}</p>
                            <small class="text-gray-500 dark:text-gray-400 block mb-4">Posted on
                                {{ $post->created_at->format('M d, Y') }}</small>
                            <div class="flex items-center space-x-4">
                                <form action="{{ route('like.post') }}" method="POST" class="flex items-center">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    @php
                                        $liked = $post->likes()->where('user_id', auth()->user()->id)->exists();
                                    @endphp
                                    <button type="submit" class="flex items-center text-gray-600 hover:text-blue-500">
                                        @if($liked)
                                            👍 <span class="ml-1 font-bold text-black hover:text-blue-500">Unlike</span>
                                        @else
                                            👍 <span class="ml-1">Like</span>
                                        @endif
                                    </button>
                                </form>
                                <span class="ml-1 mr-4">{{ $post->likes->count() }}</span>

                                <a href="{{ route('comments.show', $post->id) }}" class="flex items-center text-gray-600 hover:text-blue-500">
                                    💬 Comments ({{ $post->comments->count() }})
                                </a>
                            </div>
                            <form action="{{ route('comments.post', ['id' => $post->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="mt-4 flex items-center space-x-2">
                                    <textarea name="comment" class="w-full p-3 border rounded-lg flex-grow" rows="1"
                                        placeholder="Write a comment..." required></textarea>
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 mt-4 mb-2">
                                        Comment
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-app-layout>
    <script>
    function toggleMenu(postId) {
        const menu = document.getElementById(`menu-${postId}`);
        document.querySelectorAll('[id^="menu-"]').forEach(m => {
            if (m !== menu) m.classList.add("hidden");
        });

        menu.classList.toggle("hidden");
    }
    document.addEventListener("click", function(event) {
        document.querySelectorAll('[id^="menu-"]').forEach(menu => {
            if (!menu.contains(event.target) && !event.target.closest("button")) {
                menu.classList.add("hidden");
            }
        });
    });
</script>
</body>
</html>

