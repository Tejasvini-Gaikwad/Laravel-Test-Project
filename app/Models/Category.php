<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public static function getCategoryName($id){
        $cat_name = Category::where('id', $id)->get();
        $category_name = $cat_name->first();
       return $category_name['name'];

    }
}
