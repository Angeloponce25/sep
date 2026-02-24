<?php

class HomeController {

    public function index() {

        session_start();

        if (isset($_SESSION['user'])) {
            // Ya está logueado
            header("Location: " . BASE_URL . "/dashboard");
        } else {
            // No ha iniciado sesión
            header("Location: " . BASE_URL . "/auth/login");
        }

        exit;
    }
}
