<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    public function index() {
        $categories = Category::orderBy('id')->paginate(5);

        return view("admin.category.index", [
            'categories' => $categories
        ]);
    }

    public function add() {
        return view("admin.category.add-form");
    }

    public function store(CategoryRequest $request) {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        
        return 
            redirect()
                ->route('admin.category.index')
                ->with('success', 'Thêm danh mục thành công');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);

        return view("admin.category.edit-form", [
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, $id) {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();
        
        return 
            redirect()
                ->route('admin.category.index')
                ->with('success', 'Sửa danh mục thành công');
    }

    public function delete($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return 
            redirect()
                ->route('admin.category.index')
                ->with('success', 'Xóa danh mục thành công');
    }
}
