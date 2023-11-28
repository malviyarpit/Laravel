<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'album';

    protected $fillable = ['category_id', 'name', 'image', 'description'];

    public function getAlbumsByCategoryId($categoryId)
    {
        $categoryExist = Category::where('id', $categoryId)->first();

        if ($categoryExist) {
            return $this::where('category_id', $categoryId)->get();
        }
    }

    public function getAlbums()
    {
        $response = null;

        $response = $this::join('category', 'category.id', 'album.category_id')
            ->select('album.*', 'category.name as category_name')
            ->get();

        return $response;
    }

    public function getAlbumById($id) {
        $response = null;

        $response = $this::join('category', 'category.id', 'album.category_id')
            ->select('album.*', 'category.name as category_name')
            ->where('album.id', $id)
            ->first();

        return $response;
    }
}
