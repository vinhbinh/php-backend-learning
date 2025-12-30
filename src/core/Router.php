<?php

class Router
{
    public static function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if ($uri === '/' || $uri === '/home') {
            require_once __DIR__ . '/../controllers/HomeController.php';
            $controller = new HomeController();
            $controller->index();
            return;
        }
     
        if ($uri === '/user' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../controllers/UserController.php';
            (new UserController())->index();
            return;
        }

        if ($uri === '/user' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../controllers/UserController.php';
            (new UserController())->store();
            return;
        }

        if ($uri === '/register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../controllers/AuthController.php';
            (new AuthController())->register();
            return;
        }

        if ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../controllers/AuthController.php';
            (new AuthController())->login();
            return;
        }

        http_response_code(404);
        echo json_encode(['error' => 'Not Found']);

    }
    
}
