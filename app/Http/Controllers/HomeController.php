<?php
namespace App\Http\Controllers;

class HomeController {
    public function __construct()
    {
        echo "HomeController";
    }

    public function index()
    {
        echo "123";
    }
}