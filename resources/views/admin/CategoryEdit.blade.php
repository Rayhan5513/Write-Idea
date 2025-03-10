<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@extends('layouts.admin')

@section('content')
<div class="flex justify-between bg-slate-300 shadow-inner p-4">
    <h1 class="text-2xl">Admin Dashboard</h1>
    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>
</div>

<div class="p-5">
    <h2 class="text-xl font-bold mb-4 ">Edit Categories</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse border">
        <tbody>
            @foreach($categories as $category)
            <tr class="border">
                <td class="border p-2">
                    <form action="{{ route('admin.CategoryUpdate', $category->id) }}" method="POST" class="flex">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{ $category->name }}" 
                            class="px-2 py-1 border rounded mr-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">
                            Update
                        </button>
                    </form>
                </td>
                <td class="border p-2">
                    <!-- Delete Button -->
                    <form action="{{ route('admin.CategoryDelete', $category->id) }}" method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

   
</body>
</html>