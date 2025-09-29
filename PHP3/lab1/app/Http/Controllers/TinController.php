<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinController extends Controller
{
    public function index() {
        return view("index");
    }

    public function contact() {
        return view("contact");
    }

    public function detail($id) {
        $data = ["id" => $id];
        return view("detail", $data);
    }
}
