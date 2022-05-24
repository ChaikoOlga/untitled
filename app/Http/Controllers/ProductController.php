<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function getAll(){
       $catalog= Category::all();
       $product_name_category=Product::where('category_id', null)->get();
       return view('products', compact('catalog', 'product_name_category'));
    }
}
