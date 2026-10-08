<?php
class Auth
{
    public static function check()
    {
        return isset($_SESSION['user_id']);
    }

    // Se llama al inicio de cualquier controlador protegido
    public static function requireLogin()
    {
        if (!self::check()) {
            $_SESSION['error'] = 'Debes iniciar sesión para acceder.';
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
    }
}