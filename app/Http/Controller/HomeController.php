<?php
namespace App\Http\Controller;

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