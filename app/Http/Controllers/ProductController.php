<?php
namespace App\Http\Controllers;

class ProductController {
    public function __construct()
    {
        // echo "ProductController";
    }

    public function index()
    {
        echo "ProductController";
    }

    public function list()
    {
        echo "DetailProductController";
    }
}