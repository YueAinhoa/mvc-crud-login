<?php
class AuthController extends Controller
{
    public function index()
    {
        $this->redirect(Auth::check() ? 'product/index' : 'auth/login');
    }

    public function login()
    {
        if (Auth::check()) {
            $this->redirect('product/index');
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            $user = $this->model('User')->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user_id']  = $user['id'];
                $_SESSION['username'] = $user['username'];
                $this->redirect('product/index');
            }

            $error = 'Usuario o contraseña incorrectos.';
        }

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        $this->view('auth/login', ['error' => $error]);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASE_URL . '/auth/login');
        exit;
    }
}