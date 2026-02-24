<?php

class Router {

    public function run() {

        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
        $url = explode('/', $url);

        $controllerName = ucfirst($url[0]) . 'Controller';
        $method = isset($url[1]) ? $url[1] : 'index';
        $param = isset($url[2]) ? $url[2] : null;

        $controllerPath = '../app/controllers/' . $controllerName . '.php';

        if (!file_exists($controllerPath)) {
            die("Controlador no encontrado");
        }

        require_once $controllerPath;
        $controller = new $controllerName;

        if (!method_exists($controller, $method)) {
            die("Método no existe");
        }

        if ($param) {
            $controller->$method($param);
        } else {
            $controller->$method();
        }
    }
}
