<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Category;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function getAlbumByCategoryId($categoryId)
    {
        $albumModel = new Album();

        $albums = $albumModel->getAlbumsByCategoryId($categoryId);

        return view('album.index', compact('albums'));
    }

    public function index()
    {
        $albumModel = new Album();

        $albums = $albumModel->getAlbums();

        return view('admin.album.index', compact('albums'));
    }

    public function create()
    {
        $categoryModel = new Category();

        $categories = $categoryModel->getCategories();

        return view('admin.album.create',  compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path(), $imageName);

        Album::create([
            'name' => $request->name,
            'image' => $imageName,
            'description' => $request->description,
            'category_id' => $request->category,
            ]);

        return redirect()->route('adminAlbums.index')
            ->with('success', 'Album created successfully.');
    }

    public function show(Album $album)
    {
        $albumModel = new Album();

        $album = $albumModel->getAlbumById($album->id);

        return view('admin.album.show', compact('album'));
    }

    public function edit(Album $album)
    {
        $albumModel = new Album();

        $album = $albumModel->getAlbumById($album->id);

        $categoryModel = new Category();

        $categories = $categoryModel->getCategories();

        return view('admin.album.edit', compact('album', 'categories'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $request['image'] = !empty($request->image) ? $request->image : $album->image;

        $album->update($request->all());

        return redirect()->route('adminAlbums.index')
            ->with('success', 'Album updated successfully.');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('adminAlbums.index')
            ->with('success', 'Category deleted successfully.');
    }
}
