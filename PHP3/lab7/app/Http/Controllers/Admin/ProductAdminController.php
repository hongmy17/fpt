<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id')->get();

        return view("admin.product.index", [
            'products' => $products
        ]);
    }

    public function add()
    {
        $categories = Category::orderBy('id')->get();
        return view("admin.product.add-form", [
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->title = $request->input('name');
        $product->thumbnail = 'default-product-image.png';
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->save();

        return
            redirect()
            ->route('admin.product.index')
            ->with('success', 'Thêm sản phẩm thành công');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('id')->get();

        return view("admin.product.edit-form", [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->title = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->save();

        return
            redirect()
            ->route('admin.product.index')
            ->with('success', 'Sửa sản phẩm thành công');
    }

    public function info($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::findOrFail($product->category_id);

        return view("admin.product.info", [
            'product' => $product,
            'category' => $category,
        ]);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Xóa sản phẩm thành công');
    }
}
