<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderBy('id')->paginate(5);
        $categories = Category::orderBy('id')->get();

        return view('client.product.index', [
            "products" => $products,
            "categories" => $categories,
        ]);
    }

    public function byCategory($id) {
        $products = Product::where('category_id', $id)->paginate(5);
        $categories = Category::orderBy('id')->get();

        return view('client.product.index', [
            "products" => $products,
            "categories" => $categories,
        ]);
    }

    public function detail($id) {
        $product = Product::find($id);
        $relateProducts = 
            Product::where('category_id', $product->category_id)
                ->where('id', '!=', $id)
                ->paginate(5);

        return view('client.product.detail', [
            "product" => $product,
            "relateProducts" => $relateProducts,
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
