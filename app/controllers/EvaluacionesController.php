<?php


require_once '../app/core/Database.php';

class EvaluacionesController extends Controller {
    
    
    

    public function __construct() 
    {
            session_start();

            if (!isset($_SESSION['user'])) {
                header("Location: " . BASE_URL . "/auth/login");
                exit;
            }

        
        
    }

    public function index()
    {   
        
        $this->view('evaluaciones/index', [
            'title' => 'Evaluaciones',
            'evaluaciones' => 'Test de Evaluaciones'
            ]);
    }
}
