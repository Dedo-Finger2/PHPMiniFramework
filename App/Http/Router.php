<?php

namespace App\Http;

class Router
{
    private static $routes = ['GET' => [], 'POST' => []];
    private static $controllers = [];
    
    /**
     * Método responsável por adiconar uma nova rota à lista de rotas de GET
     * @param string $uri - URI da rota
     * @param string $controller - Contorlador que será usado pela rota
     * @param string $method - Método do controlador que será ativado
     * @return void
     */
    public static function get(string $uri, string $controller, string $method, array $params = []) {
        if ($uri == null || !isset($controller) || !isset($method)) return;
        
        self::$routes["GET"][$uri] = $method;
        self::$controllers[$uri] = $controller;
    }

    /**
     * Método responsável por adiconar uma nova rota à lista de rotas de POST
     * @param string $uri - URI da rota
     * @param string $controller - Contorlador que será usado pela rota
     * @param string $method - Método do controlador que será ativado
     * @return void
     */
    public static function post(string $uri, string $controller, string $method, array $params = []) {
        if ($uri == null || !isset($controller) || !isset($method)) return;
        
        self::$routes["POST"][$uri] = $method;
        self::$controllers[$uri] = $controller;
    }

    public static function getRoutes() {
        return self::$routes;
    }

    public static function getControllers() {
        return self::$controllers;
    }

    /**
     * Método responsável por renderizar o conteúdo da rota na tela1
     * @param string $controller - Controlador que será usado
     * @param string $method - Método do controlador
     * @throws \Exception
     * @return void
     */
    private static function render(string $controller, string $method) {
        $controllerNamespace = "App\\Http\\Controller\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new \Exception("<p>O controlador <strong>{$controller}</strong> não existe!</p>");
        }

        $params = [
            'GET' => $_GET ?? '',
            'POST' => $_POST ?? ''
        ];

        $controllerInstance = new $controllerNamespace();
        $controllerInstance->$method($params);
    }

    /**
     * Método responsável por executar o contorlador correspondente à rota requisitada
     * @throws \Exception
     * @return void
     */
    public static function checkRoute() {
        try {
            $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
            $requestMethod = $_SERVER['REQUEST_METHOD'];

            if (!isset(self::$routes[$requestMethod])) {
                throw new \Exception("<p>[ERROR] Método HTTP <strong>{$requestMethod}</strong> não é válido!</p>");
            }

            if (!array_key_exists($uri, self::$routes[$requestMethod])) {
                throw new \Exception("<p>[ERROR] A rota <strong>{$uri}</strong> não existe!</p>");
            }

            $controllerMethod = self::$routes[$requestMethod][$uri];
            $controllerRoute = self::$controllers[$uri];

            self::render($controllerRoute, $controllerMethod);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
