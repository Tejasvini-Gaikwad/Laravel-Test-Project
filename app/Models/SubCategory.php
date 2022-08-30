<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    public static function getAllSubCategories($category_id){
        $res = SubCategory::where('category_id',$category_id)->get()->pluck('name','id');
        return $res;
    }
}
