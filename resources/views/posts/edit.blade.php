


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="max-w-3xl mx-auto mt-5 bg-white p-3 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6">update your Post</h2>
 
    
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="title">Title</label>
            <input type="text" id="title" name="title"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                   value="{{ $post->title }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="content">Content</label>
            <textarea id="content" name="content" rows="5"
             class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
             required>{{ $post->content }}</textarea>
        </div>

        

        <div class="flex justify-end">
    <!-- Submit Button -->
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
        Update Post
    </button>
        </div>
    </form>
</div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>
