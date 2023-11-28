<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoryList()
    {
        $categoryModel = new Category();

        $categories = $categoryModel->getCategories();

        return view('category.index', compact('categories'));
    }

    public function index()
    {
        $categoryModel = new Category();

        $categories = $categoryModel->getCategories();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path(), $imageName);

        Category::create([
            'name' => $request->name,
            'image' => $imageName,
            'description' => $request->description,
            'slug' => $request->slug,
        ]);

        return redirect()->route('adminCategories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        $request['image'] = !empty($request->image) ? $request->image : $category->image;

        $category->update($request->all());

        return redirect()->route('adminCategories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('adminCategories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
