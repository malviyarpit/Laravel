<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'album';

    protected $fillable = ['category_id', 'name', 'image', 'description'];


    public function getAlbumsByCategoryId($categoryId) {

    $categoryExist = Category::where('id', $categoryId)->first();

    if ($categoryExist) {
        return $this::where('category_id', $categoryId)->get();
    }
    }
}
