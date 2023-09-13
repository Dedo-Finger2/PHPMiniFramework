<?php

namespace App\Http\Controller;

class HomeController
{
    public function index($params) {
        echo "Home - ";
        echo "<a href='".URL."/login'>Login</a> - <a href='".URL."/produtos'>Produtos</a>";
    }
}
