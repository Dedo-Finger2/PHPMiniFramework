<?php

namespace App\Http\Controller;

class Login
{
    public function index() {
        echo "Login - ";
        echo "<a href='".URL."/'>Home</a> - <a href='".URL."/produtos'>Produtos</a>";
    }
}
