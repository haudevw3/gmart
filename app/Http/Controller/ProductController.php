<?php
namespace App\Http\Controller;

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