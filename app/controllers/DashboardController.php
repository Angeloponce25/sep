<?php

require_once '../app/models/User.php';

class DashboardController extends Controller {


    private $userModel;
    
    public function __construct() {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        $this->userModel = new User();

    }

    public function index()
    {     
        $paciente = $this->userModel->getPacienteById($_SESSION['user']['id_paciente']);

        $this->view('dashboard/index', [
            'title' => 'Dashboard',
            'data' => $paciente
        ]);
    }
}
