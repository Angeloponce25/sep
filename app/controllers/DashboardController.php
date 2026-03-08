<?php

require_once '../app/models/User.php';
require_once '../app/models/Evaluaciones.php';

class DashboardController extends Controller {


    private $userModel;
    private $evaluacionesModel;
    
    public function __construct() {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        $this->userModel = new User();
        $this->evaluacionesModel = new Evaluaciones();

    }

    public function index()
    {     
        $id=$_SESSION['user']['id_paciente'];
        
        $paciente = $this->userModel->getPacienteById($id);
        $evaluaciones = $this->evaluacionesModel->getEvaluacionesPaciente($id);

        $this->view('dashboard/index', [
            'title' => 'Dashboard',
            'data' => $paciente,
            'evaluaciones' => $evaluaciones
        ]);
    }
}
