<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = DB::table("products")->get();

        return view('client.product.index', [
            "products" => $products
        ]);
    }

    public function showDetail($id) {
        $product = 
            DB::table("products")
                ->where("id", $id)
                ->first();

        return view('client.product.detail', [
            "product" => $product
        ]);
    }

    

    public function showProductsByCategoryID($categoryID) {
        $products = 
            DB::table("products")
                ->where("category_id", $categoryID)
                ->get();
            
                
        return view("client.product.index", [
            "products" => $products
        ]);
    }
}
