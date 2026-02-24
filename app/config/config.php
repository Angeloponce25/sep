<?php

/* ==============================
   CONFIGURACIÓN GENERAL
============================== */

date_default_timezone_set("America/Lima");
error_reporting(E_ALL);

/* ==============================
   RUTAS DEL SISTEMA
============================== */

/*define('BASE_URL', 'http://midominio.com/');*/
define('BASE_URL', 'http://localhost:8088/sep/public');
define('APP_PATH', dirname(__DIR__));
define('PUBLIC_PATH', $_SERVER['DOCUMENT_ROOT']);

/* ==============================
   BASE DE DATOS
============================== */

define('DB_HOST', 'localhost');
define('DB_NAME', 'sep');
define('DB_USER', 'root');
define('DB_PASS', '');

/* ==============================
   SESIONES
============================== */

define('SESSION_TIME', 3600); // 1 hora

/* ==============================
   SISTEMA
============================== */

define('SYSTEM_NAME', 'SEP');
define('VERSION', '1.0.0');
define('DATE_NOW', date('Y-m-d H:i:s'));

/* ==============================
   DASHBOARD OK
============================== */
$url = $_GET['url'] ?? 'dashboard';
define('CURRENT_URL', $url);