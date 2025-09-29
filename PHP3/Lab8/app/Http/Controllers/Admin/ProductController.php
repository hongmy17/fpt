<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderByDesc('id')->paginate(5);

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', [
            'categories' => $categories
        ]);
    }


    // request = yêu cầu => client -> server
    public function store(Request $request)
    {
        // ảnh sẽ sai, submit lên ảnh phải mảng
        // xử lý ngay đây
        $image_uploaded_url = '';
        // ORM
        Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'thumbnail' => $image_uploaded_url
            // con nhieu cot nua
        ]);

        return redirect()->route('admin.product.list');
    }


    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', [
            'categories' => $categories,
            'product' => $product
        ]);
    }

    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            // con nhieu cot nua
        ]);

        return redirect()->route('admin.product.list');
    }


    public function delete(int $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('admin.product.list');
    }
}
