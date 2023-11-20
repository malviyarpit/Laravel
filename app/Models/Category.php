<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = ['name', 'image', 'description'];

    public function getCategories()
    {
        return $this->select('id', 'name', 'image', 'description', 'slug')->get();
    }
}
