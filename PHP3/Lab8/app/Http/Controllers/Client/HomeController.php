<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class HomeController extends Controller
{

    public function test() {
        return view('client.layouts.master');
    }

    public function index()
    {
        $data = DB::table('categories')->get();

        return view('client.home', [
            'categories' => $data
        ]);
    }


    public function tinTrongLoai($idLoaiSanPham)
    {
        // $data = DB::table('products')
        //     ->where('category_id', $idLoaiSanPham)
        //     ->get();

        
        return view('client.categories.list-product', [
            'products' => Product::where('category_id', $idLoaiSanPham)->get()
        ]);
    }

    
    public function chitiet($idsanpham)
    {
        // $data = DB::table('products')
        //     ->where('id', $idsanpham)
        //     ->first();

        return view('client.product.detail', [
            'product' => Product::find($idsanpham)
        ]);
    }

}
