<?php
use App\Http\Router;

require __DIR__ . "/vendor/autoload.php";

define("URL", "http://".$_SERVER['HTTP_HOST']);

Router::get("/", "HomeController", "index");
Router::get("/login", "Login", "index");
Router::get("/controller", "Controller", "index");
Router::get("/produtos", "Controller", "getProdutos");
Router::post("/produtos", "Controller", "store");

Router::checkRoute();

// echo '<pre>';
// print_r(URL);
// echo '</pre>';

// echo '<pre>';
// print_r(parse_url($_SERVER['REQUEST_URI']));
// echo '</pre>';

// echo '<pre>';
// print_r(Router::getRoutes());
// echo '</pre>';
// echo '<pre>';
// print_r(Router::getControllers());
// echo '</pre>';