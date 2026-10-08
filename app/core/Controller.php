<?php
// Funcion auxiliar para escapar HTML (previene XSS)
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

class Controller
{
    protected function model($name)
    {
        require_once APP_PATH . "/models/$name.php";
        return new $name();
    }

    protected function view($view, $data = [])
    {
        extract($data);
        require APP_PATH . "/views/$view.php";
    }

    protected function redirect($path)
    {
        header('Location: ' . BASE_URL . '/' . $path);
        exit;
    }
}