<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function logConsole($data) {
        echo "<script>console.log(".$data.")</script>";
    }
}
