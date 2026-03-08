<?php

require_once '../app/models/Evaluaciones.php';

class EvaluacionesController extends Controller {

    private $evaluacionesModel;

    public function __construct() 
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        $this->evaluacionesModel = new Evaluaciones();
    }

    public function examen($id_evaluacion)
    {

        $rows = $this->evaluacionesModel->getPreguntasExamen($id_evaluacion);

        echo "<pre>";
        print_r($rows);
        exit;

    }

}