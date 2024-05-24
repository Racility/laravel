<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Rent_Book.category', ['categories' => $categories]);
    }

    public function add()
    {
        return view ('Rent_Book.category-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);
        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Category Added Successfully');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('Rent_Book.category-edit', ['category'=>$category]);
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);
        
        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category Updated Successfully');
    }
    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('Rent_Book.category-delete', ['category' => $category]);
    }
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Successfully');
    }
    public function deletedCategory()
    {
        $deletedCategory = Category::onlyTrashed()->get();
        return view('Rent_Book.category-delete-list', ['deletedCategories' => $deletedCategory]);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Category Restored Successfully');
    }
}
