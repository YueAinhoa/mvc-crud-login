<?php
session_start();

define('APP_PATH', dirname(__DIR__) . '/app');

require_once APP_PATH . '/config/config.php';
require_once APP_PATH . '/core/Database.php';
require_once APP_PATH . '/core/Auth.php';
require_once APP_PATH . '/core/Controller.php';

// URL esperada: controlador/metodo/parametro
$url   = isset($_GET['url']) ? trim($_GET['url'], '/') : '';
$parts = $url === '' ? [] : explode('/', $url);

$name   = $parts[0] ?? 'auth';
$method = $parts[1] ?? 'index';
$params = array_slice($parts, 2);

// Solo letras para evitar rutas maliciosas
if (!preg_match('/^[a-z]+$/i', $name) || !preg_match('/^[a-z]+$/i', $method)) {
    http_response_code(404);
    exit('Página no encontrada');
}

$class = ucfirst(strtolower($name)) . 'Controller';
$file  = APP_PATH . "/controllers/$class.php";

if (!file_exists($file)) {
    http_response_code(404);
    exit('Página no encontrada');
}

require_once $file;
$controller = new $class();

if (!method_exists($controller, $method) || !is_callable([$controller, $method])) {
    http_response_code(404);
    exit('Página no encontrada');
}

call_user_func_array([$controller, $method], $params);