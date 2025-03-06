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
                            <h2 class="text-2xl font-semibold mb-6">Create a New Post</h2>
                            <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2" for="title">Title</label>
                                    <input type="text" id="title" name="title"
                                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                        value="{{ old('title') }}" required>
                                </div>
                                <div class="relative inline-block text-left">
                                    <button type="button" id="category-dropdown-button"
                                        class="inline-flex justify-center w-full p-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Select Categories
                                        <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="menu"
                                        class="hidden absolute right-0 mt-2 w-56 bg-white border rounded-lg shadow-lg z-10">
                                        <div class="px-4 py-3">
                                            @foreach($categories as $category)
                                                <label class="flex items-center space-x-3 mb-4">
                                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                                        class="form-checkbox h-5 w-5 text-indigo-600 rounded focus:ring-indigo-500 transition duration-200">
                                                    <span
                                                        class="text-gray-800 font-medium hover:text-indigo-600 transition duration-200">{{ $category->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2" for="content">Content</label>
                                    <textarea id="content" name="content" rows="5"
                                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                        required>{{ old('content') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2" for="image">Upload Image</label>
                                    <input type="file" id="image" name="image"
                                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                        Create Post
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
<script>
    const dropdownButton = document.getElementById('category-dropdown-button');
    const dropdownMenu = document.getElementById('menu');
    dropdownButton.addEventListener('click', function (event) {
        event.stopPropagation();
        dropdownMenu.classList.toggle('hidden');
    });
    document.addEventListener('click', function (event) {
        if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
    dropdownMenu.addEventListener('click', function (event) {
        event.stopPropagation();
    });
</script>