<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $product_arr = [];
        foreach($products as $key=>$product){
            $temp = [];
            $temp['id'] = $product['id'];
            $temp['name'] = $product['name'];
            $temp['category'] = Category::getCategoryName($product['category']);
            $temp['sub_category'] = $product['sub_category'];
            $temp['price'] = $product['price'];
            $product_arr[]=$temp;
        }
        
        return view('index', ['products' => $product_arr]);
    }
    public function getSubCategory(){
        $sub_categories = SubCategory::where('category_id', $_POST['category_id'])->get()->pluck('name','id');
        $res = "<option value=''>Select Sub-Category</option>";
        foreach($sub_categories as $key=>$sub_cat){
            $res .= "<option value=".$key.">".$sub_cat."</option>";
        }
        return response()->json(['res' => $res]);
    }

    public function saveProduct(Request $req){
        $post_data = $req->input();
        $req->validate([
            'name' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'price' => 'required'
        ]);
        $model = new Product();
        $model->name = $post_data['name'];
        $model->category = $post_data['category'];
        $model->sub_category = $post_data['sub_category'];
        $model->price = $post_data['price'];
        $model->save();
        return view('home');
    }

    public function editProductView($id){
        $product_res = Product::find($id);
        $categories = Category::all()->pluck('name','id');
        $sub_categories = SubCategory::getAllSubCategories($product_res['category']);
        return view('edit', ['data' => $product_res, 'categories' => $categories, 'sub_categories' => $sub_categories]);
    }

    public function deleteProduct($id){
        $product_res = Product::find($id);
        $product_res->delete();
        $products = Product::all();
        $product_arr = [];
        foreach($products as $key=>$product){
            $temp = [];
            $temp['id'] = $product['id'];
            $temp['name'] = $product['name'];
            $temp['category'] = Category::getCategoryName($product['category']);
            $temp['sub_category'] = $product['sub_category'];
            $temp['price'] = $product['price'];
            $product_arr[]=$temp;
        }
        return view('index', ['products' => $product_arr]);
    }

    public function updateProduct(Request $req, $id){
        $post_data = $_POST;
        $model = Product::find($id);
        $model->name = $post_data['name'];
        $model->category = $post_data['category'];
        $model->sub_category = $post_data['sub_category'];
        $model->price = $post_data['price'];
        $model->save();
        return view('home');
    }
}
