<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function showInfo() {
        $data = [
            "id" => "1",
            "name" => "John Smith",
            "gender" => "Male",
        ];
        return view("student.info", $data);
    }
}
