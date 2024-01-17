<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    //
    public function addProduct()
    {
        return view('addProduct');
    }
    public function index()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(12);
        return view('shop',['products'=>$products]);
    } 
}
