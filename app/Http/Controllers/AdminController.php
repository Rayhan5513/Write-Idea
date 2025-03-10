<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;


class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }
    public function CategoryEdit()
    {
        $categories = Category::all(); // Fetch all categories
        return view('admin.CategoryEdit', compact('categories'));
    }


    public function CategoryUpdate(Request $request, Category $category)
    {
         $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Update category name
    $category->update([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.CategoryEdit')->with('success', 'Category updated successfully!');
}


public function CategoryDelete(Category $category)
{
    $category->delete();

    return redirect()->route('admin.CategoryEdit')->with('success', 'Category deleted successfully!');
}




}
