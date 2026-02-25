<?php

require_once '../app/models/User.php';

class DashboardController extends Controller {

    public function __construct() {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }
    }

    public function index()
    {
        $userModel = new User();

        $paciente = $userModel->getPacienteById($_SESSION['user']['id_paciente']);

        $this->view('dashboard/index', [
            'title' => 'Dashboard',
            'paciente' => $paciente
        ]);
    }
}
