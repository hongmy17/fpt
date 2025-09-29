<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showAllProducts() {
        $products = DB::table("products")->get();

        return view("index", [
            "products" => $products
        ]);
    }

    public function showLatestFiveProducts() {
        $products = 
            DB::table("products")
                ->select("id", "title", "description")
                ->orderBy("created_at", "desc")
                ->limit(5)
                ->get();
        
        return view("latest-five-products", [
            "products" => $products
        ]);
    }

    public function showDetailProduct($id) {
        $product = 
            DB::table("products")
                ->select("title", "slug", "description")
                ->where("id", $id)
                ->first();

        return view("detail-product", [
            "product" => $product
        ]);
    }
}
