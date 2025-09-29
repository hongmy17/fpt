<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function showAllCategories() {
        $categories = DB::table("categories")->get();

        return view("index", [
            "categories" => $categories
        ]);
    }

    public function showLatestTenCategories() {
        $categories = 
            DB::table("categories")
                ->select("id", "name", "created_at")
                ->orderBy("created_at", "desc")
                ->limit(10)
                ->get();
        
        return view("latest-ten-categories", [
            "categories" => $categories
        ]);
    }

    public function showDetailCategory($id) {
        $category = 
            DB::table("categories")
                ->select("name", "slug", "description")
                ->where("id", $id)
                ->first();

        return view("detail-category", [
            "category" => $category
        ]);
    }
}
