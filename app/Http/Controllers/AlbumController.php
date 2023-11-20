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
}
