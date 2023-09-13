<?php

namespace App\Http\Controller;

class Controller
{
    public function index() {
        echo "IndexController";
    }

    public function getProdutos($params) {
        echo "Produtos - ";
        echo "<a href='".URL."/'>Home</a> - <a href='".URL."/login'>Login</a>";
        echo '<pre>';
        print_r($params['GET']);
        echo '</pre>';

        ?>

        <form action="http://localhost:3000/produtos" method="post">
            <input type="text" name="nome" placeholder="nome">
            <button type="submit">Enviar</button>
        </form>

        <?php
    }

    public function store($params) {
        echo "Stored ";

        echo '<pre>';
        print_r($params['POST']);
        echo '</pre>';
    }
}
