<?php

require_once '../app/config/config.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Router.php';

/* 🔥 ESTA LÍNEA FALTABA */
$url = $_GET['url'] ?? 'dashboard';
define('CURRENT_URL', $url);

$router = new Router();
$router->run();
