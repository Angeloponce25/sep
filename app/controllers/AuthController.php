<?php

class AuthController {

    public function login() {
        $data['title'] = 'Loginws';
        require_once APP_PATH . '/views/auth/auth_header.php';
        require_once APP_PATH . '/views/auth/login.php';
        require_once APP_PATH . '/views/auth/auth_footer.php';
    }

    public function doLogin() {

        session_start();

        /*require_once APP_PATH . '/models/User.php';
        $userModel = new User();*/

        $username = $_POST['username'] ?? '';  
/*
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user'] = $user['username'];
            $_SESSION['login_time'] = time();

            echo "success";
        } else {
            echo "error";
        }*/
            $_SESSION['user'] = 'Angelo';
            $_SESSION['login_time'] = time();
            echo "success";//
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "/auth/login");
    }
}
