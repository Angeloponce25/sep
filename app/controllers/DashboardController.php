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
    }

    public function index()
    {       

        $id = $_SESSION['user']['id_paciente'] ?? null;        
        $paciente = $this->userModel->getPacienteById($id);

        $this->view('dashboard/index', [
            'title' => 'Dashboard',
            'data' => $paciente
        ]);
    }
}
