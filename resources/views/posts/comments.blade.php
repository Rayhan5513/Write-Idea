<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Comments</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<x-app-layout>
<div class="max-w-2xl mx-auto p-6 mt-10 bg-white rounded-2xl shadow-xl border border-gray-200">     
<h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $post->title }}</h1>
 <h5 class="text-gray-600 font-bold dark:text-gray-400">By: {{ $post->user->name }}</h5>
@if ($post->image)
  <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" class="w-[200px] h-[200px] rounded-lg mb-4">
 @endif
 <p class="text-gray-700 dark:text-gray-300 mt-2">Details: {{ $post->content }}</p>
 <small class="text-gray-500 dark:text-gray-400 block mb-4">Posted on {{ $post->created_at->format('M d, Y') }}</small>

    <h2 class="text-3xl font-bold text-gray-900 mb-2 flex items-center gap-2">
        📝 Comments
    </h2>
    <ul class="space-y-6">
        @foreach ($comments as $comment)
            <li class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl shadow-sm border border-gray-200">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full text-lg font-semibold">
                        {{ substr(optional($comment->user)->name ?? 'U', 0, 1) }}
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <strong class="text-lg text-blue-600">
                            {{ optional($comment->user)->name ?? 'Unknown User' }}
                        </strong>
                        <span class="text-sm text-gray-500">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <p class="text-gray-700 mt-1">
                        {{ $comment->body }}
                    </p>
                </div>
            </li>
        @endforeach
    </ul>
</div>
</x-app-layout>
</body>
</html>
