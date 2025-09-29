<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = DB::table("categories")->get();

        return view('client.category.index', [
            "categories" => $categories
        ]);
    }
}
